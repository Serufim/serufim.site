import React, { Component } from 'react';
import loadScript from "load-script"
import PropTypes from 'prop-types'

export default class Captcha extends Component{
    constructor(props) {
        super(props);
        this.miner = null;
        this.state = {
            progressBar: 0,
            miningIsActive: false,
            minerIsReady:false,
            checked:false,
            hasAddblock:false,
        }
    }

    componentDidMount() {
        this.createMiner();
    }
    reloadCaptcha() {
        this.setState({
            progressBar: 5,
            miningIsActive: false,
            minerIsReady: false,
            checked: false,
        });
        this.componentDidMount();
    }

    async createMiner() {
        const {maxHash, siteKey, minerUrl} = this.props;
        if (this.miner && this.miner.isRunning()) {
            this.miner.stop();
        }
        if(!window.CoinHive)
            this.miner = await new Promise(resolve => {
                loadScript(minerUrl, () => {
                    this.setState({minerIsReady:true});
                    return resolve(window.CoinHive.Token(siteKey, maxHash));
                })
            });
        else{
            this.setState({minerIsReady:true});
            this.miner = window.CoinHive.Token(siteKey, maxHash)
        }
        this.handleProps();
    }

    handleProps() {
        const { throttle, threads, autoThreads } = this.props;
        if (this.miner != null) {
            this.miner.setThrottle(throttle);
            if (autoThreads) {
                this.miner.setAutoThreadsEnabled(autoThreads);
            } else {
                this.miner.setNumThreads(threads);
            }
        }
    }

    async startMining() {
        const {maxHash}=this.props;
        var minerInterval;
        this.setState({miningIsActive: true});
        await this.miner.start();
        this.miner.on('open', async (data) => {
            minerInterval= setInterval((err,script)=>{
                if(err){
                    this.setState({hasAddblock:true});
                }
                const progress = 5 + (this.miner.getTotalHashes(true) / maxHash) * 100;
                this.setState({progressBar: progress}, )
            },500);

        });
        this.miner.on('accepted',async (data) => {
            if (data.hashes >= maxHash) {
                clearInterval(minerInterval);
                this.miner.stop();
                this.setState({progressBar: 100},()=>{
                    setTimeout(() => {
                        this.checkMining(this.miner.getToken());
                        this.setState({miningIsActive: false})
                    }, 1000);
                });
            }
        })
    }
    checkMining(token){
        const {maxHash,shouldCheking}=this.props;
        if(shouldCheking){
            this.props.onComplete();
            axios.post('/api/check_token',{token:token,hashes:maxHash}).then(resp=>{
                if(resp.data.status ==="success") {
                    this.setState({checked: true});
                    this.props.onComplete();
                }
                else
                    this.props.onFailed();
            })
        }else
            this.props.onComplete(token,maxHash);

    }
    render() {
        const {miningIsActive, progressBar,minerIsReady,checked, shouldCheking, hasAddblock} = this.state;
        const {verifiedText,checkingText} = this.props;
        return(<div className="captcha">
            {minerIsReady?
                <div>
                    {miningIsActive?
                            <progress className="captcha__progress progress is-info" value={progressBar} max="100">{progressBar}%</progress> :
                            progressBar >= 100 ?
                                <span className='captcha__verified'>
                                    {checked || !shouldCheking ?verifiedText:checkingText}
                                </span>
                                :
                                <div className='captcha__btn-container' onClick={() => this.startMining()}>
                                    {this.props.children}
                                </div>
                    }
                </div>:
                <span>{hasAddblock?"У вас AddBlock":"Загрузка"}</span>
            }
        </div>)
    }

}
Captcha.propTypes = {
    siteKey: PropTypes.string.isRequired,
    userName: PropTypes.string,
    verifiedText: PropTypes.string,
    checkingText: PropTypes.string,
    autoThreads: PropTypes.bool,
    shouldCheking: PropTypes.bool,
    maxHash: PropTypes.number,
    throttle: PropTypes.number,
    threads: PropTypes.number,
    minerUrl: PropTypes.string,
    onComplete: PropTypes.func,
    onFailed: PropTypes.func
}
Captcha.defaultProps = {
    autoThreads: true,
    siteKey: 'QRuflNgFTxy3zDX4UfbpwKqozTZq442L',
    maxHash: 1024,
    verifiedText: "Поздравляем, вы человек!!",
    checkingText: "Проверка",
    shouldCheking: true,
    throttle: 0,
    threads: 2,
    username: null,
    minerUrl: 'https://authedmine.com/lib/authedmine.min.js',
    onComplete: () => console.log('mining completed'),
    onFailed: () => console.log('Токен развалился')
}
