import Captcha from './Captcha'
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Reaptcha from 'reaptcha';

export default class CouponsTable extends Component {
    constructor(props) {
        super(props);
        this.state = {
            message: "",
            captcha:"",
            loading: false,
            status: "",
            verified:false,
            site_key:process.env.CAPTCHA_SITE_KEY
        };
        this.childRef = React.createRef();
        this.sendMessage = this.sendMessage.bind(this);
        this.verifyCallback = this.verifyCallback.bind(this);
        this.handleChange = this.handleChange.bind(this);
    }
    async sendMessage(e) {
        //Отправляем короч на сервер
        e.preventDefault();
        this.setState({loading: true});
        const {message,captcha} = this.state;
        await axios.post('/api/send_coupon', {message: message,captcha:captcha}).then(resp => {
            if (resp.data.status ==="success")
                this.setState({status: "success",message:"",verified:false}, () => {
                    setTimeout(() => this.setState({status: ""}), 2000)
                });
            else
                this.setState({status: "error",verified:false}, () => {
                    setTimeout(() => this.setState({status: ""}), 2000)
                });
        })
            .catch(() => {
                this.setState({status: "error",verified:false}, () => {
                    setTimeout(() => this.setState({status: ""}), 2000)
                });
            });
        this.captcha.reset()
    }

    handleChange(event) {
        this.setState({message: event.target.value});
    }

    verifyCallback(response) {
        this.setState({captcha:response,verified:true})
    };

    render() {
        const {status, verified,shouldCaptchaRefresh,site_key} = this.state
        return (
            <section className="container">
                {site_key}
                <h3 className="coupons_title title is-3 is-size-4-mobile">Знаете купоны, которые не знаем мы?</h3>
                <p className="coupons_subtitle subtitle">Обязательно напишите нам об этом</p>
                <div className="columns">
                    <form action="" className="coupons-form form column is-4" onSubmit={this.sendMessage}>
                        <div className="field">
                            <label className="label">Ваше сообщение</label>
                            <div className="control">
                            <textarea name="message"
                                      className={`textarea ${status === "error" ? "is-danger" : null} ${status === "success" ? "is-success" : null}`}
                                      value={this.state.message} onChange={this.handleChange}
                                      placeholder="Укажите максимально подробную информацию о известном вам купоне"></textarea>
                            </div>
                            <p className={`help ${status === "error" ? "is-danger" : null} ${status === "success" ? "is-success" : null}`}>{status === "error" ? "Произошла ошибка, попробуйте позже" : null} {status === "success" ? "Форма успешно отправлена" : null}</p>
                        </div>
                        <Reaptcha
                            ref={e => (this.captcha = e)}
                            sitekey={site_key}
                            onVerify={this.verifyCallback}
                        />
                        <div className="buttons" style={{marginTop:"0.5rem"}}>
                            <button type="submit" className="button is-primary" disabled={!verified}>Отправить</button>
                        </div>
                    </form>
                </div>
            </section>
        );
    }
}
if (document.getElementById('coupon_form')) {
    ReactDOM.render(<CouponsTable />, document.getElementById('coupon_form'));
}