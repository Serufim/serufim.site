import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export  default class CouponsTable extends Component{
    constructor(props){
        super(props);
        this.state={
            successfull:null
        }
        this.copyRef = this.copyRef.bind(this)
    }
    copyRef(){
        // Выборка ссылки с электронной почтой
        var referalLink = document.querySelector('.coupons_referal-block__coupon');
        var range = document.createRange();
        range.selectNode(referalLink);
        window.getSelection().addRange(range);

        try {
            // Теперь, когда мы выбрали текст ссылки, выполним команду копирования
            var successful = document.execCommand('copy');
            successful? this.setState({successfull:true}):this.setState({successfull:false});
            setTimeout(()=>this.setState({successfull:null}),2000)
        } catch(err) {
            this.setState({successfull:false});
            setTimeout(()=>this.setState({successfull:null}),2000)
        }
        window.getSelection().removeAllRanges();
    }

    render() {
        const {successfull} = this.state;
        return (
            <div className="coupons_referal-container container">
                <h3 className="coupons_title title is-3 is-size-4-mobile">Пригодились купоны?</h3>
                <p className="coupons_subtitle subtitle">Не забудьте сказать спасибо</p>
                <div className="coupons_referal-block">
                    <div className="coupons_referal-block__wrapper">
                        <span className={`coupons_referal-block__coupon ${successfull===true?"coupon-success":null} ${successfull===false?"coupon-danger":null}`}>
                            CWZPA7
                        </span>
                        <button className="coupons_referal-block__copy-button button is-medium" onClick={this.copyRef}>
                             <span className="icon">
                                <i className="fas fa-copy"></i>
                            </span>
                            <span>Копировать</span>
                        </button>
                    </div>
                    <p className={`coupons_referal-block__copy-helper ${successfull===true?"has-text-success":null} ${successfull===false?"has-text-danger":null}`}>
                        {successfull===true?"Успешно скопированно":null}
                        {successfull===false?"Успешно скопированно":null}
                    </p>
                    <div className="coupons_referal-descriptions">
                        <p className="coupons_referal-descriptions__text">
                            Вставьте данный реферальный код в вашем приложении burger king и вы получите картофель фри
                            всего за 1 рубль.
                        </p>
                        <p className="coupons_referal-descriptions__text">
                            А я получу чистое моральное удовлетворение
                        </p>
                        <p className="coupons_referal-descriptions__text">
                            Если вы уже зарегистрированны, то можете сказать спасибо позже более традиционными способами в разделе донатов
                        </p>
                    </div>
                </div>
            </div>
        );
    }
}
if (document.getElementById('coupon_ref')) {
    ReactDOM.render(<CouponsTable />, document.getElementById('coupon_ref'));
}