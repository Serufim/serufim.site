import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import MediaQuery from 'react-responsive';

import Captcha from './Captcha'

export  default class CouponsTable extends Component{
    /*
    * Черезвычайно крутая таблица с купонами кфс
    * Для начала перед тем как рендерить ходит за таблицей
    *
    * */
    constructor(props){
        super(props);
        this.state = {
            loading:true,
            table:[],
            render_table:[],
            sortingMethod:"",
            types:[],
            filters_open:false
        };
        this.sort_table = this.sort_table.bind(this);
        this.sort_by_type = this.sort_by_type.bind(this);
        this.toogleFilter = this.toogleFilter.bind(this);
    }
    componentWillMount() {
        axios.get('/api/coupons').then(resp=>{
            resp.data.data.forEach(item=>item.value = item.actual_price - item.price);
            this.setState({table:resp.data.data,render_table:resp.data.data,loading:false})
        });
        axios.get('/api/coupon_types').then(resp=>{
            this.setState({types:resp.data.data});
        });
    }
    toogleFilter(){
        this.setState({filters_open:!this.state.filters_open});
    }
    calculate_value(price,actual_price){
        let value = actual_price - price;
        let percent = 0;
        if(value > 0){
            percent = value / (actual_price / 100);
        }else{
            percent = value / (price * 100) * -1;
        }
        return `${value} (${percent.toFixed(0)}%)`
    }
    sort_table(field, order){
        let new_table = this.state.render_table;
        if(this.state.sortingMethod === `${field}-${order}`){
            let new_table = this.state.render_table.sort((a,b) => a.id - b.id);
            this.setState({render_table:new_table,sortingMethod:''});
        }else{
            if (order === 'desc'){
                let new_table = this.state.render_table.sort((a,b) => a[field] - b[field]);
            }else{
                let new_table = this.state.render_table.sort((a,b) => b[field] - a[field]);
            }
            this.setState({render_table:new_table,sortingMethod:`${field}-${order}`});
        }

    };
    sort_by_type(e){
        let new_table = this.state.table;
        let param = parseInt(e.target.value);
        if (param){
            new_table = new_table.filter((item)=>item.type.id === param);
            this.setState({render_table:new_table},()=>{
                if (this.state.sortingMethod){
                    let params = this.state.sortingMethod.split('-');
                    this.sort_table(params[0], params[1]);
                }
            });
        }else{
            this.setState({render_table:new_table},()=>{
                if (this.state.sortingMethod){
                    let params = this.state.sortingMethod.split('-');
                    this.sort_table(params[0], params[1]);
                }
            })
        }


    }
    render() {
        const {loading,render_table,sortingMethod,types,filters_open} = this.state;
        return(
            <div className="container">
                <h2 className="coupons_title title is-2 is-size-3-mobile">Подробная таблица</h2>
                <p className="coupons_subtitle subtitle">Мы постоянно обновляем все данные</p>
                {loading ? "Загрузка" :
                    <div>
                    <MediaQuery query="(min-device-width: 1024px)">

                        <table className="coupon-table table is-hoverable ">
                            <thead className="is-hidden-mobile">
                            <tr>
                                <th className="coupon-table__th">
                                    <div className="select">
                                        <select onChange={this.sort_by_type} defaultValue={0}>
                                            <option value={0}>Все типы</option>
                                            {types.map((type, i) => <option key={i}
                                                                            value={type.id}>{type.name}</option>)}
                                        </select>
                                    </div>
                                </th>
                                <th className="coupon-table__th">Купон</th>
                                <th className="coupon-table__th"><span style={{marginRight: "5px"}}>Стоимость</span>
                                    <a onClick={(e) => this.sort_table('price', 'asc')}
                                       className={sortingMethod === "price-asc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-up"/>
                                    </a>
                                    <a onClick={(e) => this.sort_table('price', 'desc')}
                                       className={sortingMethod === "price-desc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-down"/>
                                    </a>
                                </th>
                                <th className="coupon-table__th"><span style={{marginRight: "5px"}}>Без купона</span>
                                    <a onClick={(e) => this.sort_table('actual_price', 'asc')}
                                       className={sortingMethod === "actual_price-asc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-up"/>
                                    </a>
                                    <a onClick={(e) => this.sort_table('actual_price', 'desc')}
                                       className={sortingMethod === "actual_price-desc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-down"/>
                                    </a>
                                </th>
                                <th className="coupon-table__th"><span style={{marginRight: "5px"}}>Выгода</span>
                                    <a onClick={(e) => this.sort_table('value', 'asc')}
                                       className={sortingMethod === "value-asc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-up"/>
                                    </a>
                                    <a onClick={(e) => this.sort_table('value', 'desc')}
                                       className={sortingMethod === "value-desc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-down"/>
                                    </a>
                                </th>
                                <th className="coupon-table__th">Описание</th>
                            </tr>
                            </thead>
                            <tfoot className="is-hidden-mobile">
                            <tr>
                                <th>Куда</th>
                                <th>Купон</th>
                                <th>Стоимость</th>
                                <th>Без купона</th>
                                <th>Выгода</th>
                                <th>Описание</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            {render_table.map((row, i) => <tr key={row.id} className="coupon-table-row">
                                <td className="coupon-table-row__type is-narrow-tablet">
                                    {row['type']['name']}</td>
                                <td className="coupon-table-row__code has-text-info is-narrow-tablet">
                                    {row.code}
                                </td>
                                <td className="coupon-table-row__price is-narrow-tablet has-text-centered-mobile">
                                    <p className="label is-hidden-tablet">Цена</p>
                                    {row['price']}
                                </td>
                                <td className="coupon-table-row__actual-price has-text-danger is-narrow-tablet has-text-centered-mobile">
                                    <p className="label is-hidden-tablet">Без купона</p>
                                    {row['actual_price']}
                                </td>
                                <td className="coupon-table-row__value has-text-success is-narrow-tablet has-text-centered-mobile">
                                    <p className="label is-hidden-tablet">Выгода</p>
                                    {this.calculate_value(row['price'], row['actual_price'])} </td>
                                <td className="coupon-table-row__description is-narrow-tablet">
                                    <p className="label is-hidden-tablet">Описание</p>
                                    {row['description']}
                                </td>
                            </tr>)}
                            </tbody>
                        </table>
                    </MediaQuery>
                    < MediaQuery query="(max-device-width: 1023px)">
                        <div className="coupon-filters has-text-centered">
                            <button className="coupon-filters_toogle button is-rounded is-large" onClick={this.toogleFilter}>
                                <span>Фильтры</span>
                            </button>
                            {filters_open?
                            <div className="coupon-filters-block box">
                                <div className="coupon-filter">
                                    <strong>По цене</strong>
                                    <a onClick={(e) => this.sort_table('price', 'asc')}
                                       className={sortingMethod === "price-asc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-up fa-2x"/>
                                    </a>
                                    <a onClick={(e) => this.sort_table('price', 'desc')}
                                       className={sortingMethod === "price-desc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-down fa-2x"/>
                                    </a>
                                </div>
                                <div className="coupon-filter">
                                    <strong>Без купона</strong>
                                    <a onClick={(e) => this.sort_table('actual_price', 'asc')}
                                       className={sortingMethod === "actual_price-asc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-up fa-2x"/>
                                    </a>
                                    <a onClick={(e) => this.sort_table('actual_price', 'desc')}
                                       className={sortingMethod === "actual_price-desc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-down fa-2x"/>
                                    </a>
                                </div>
                                <div className="coupon-filter">
                                    <strong>Выгода</strong>
                                    <a onClick={(e) => this.sort_table('value', 'asc')}
                                       className={sortingMethod === "value-asc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-up fa-2x"/>
                                    </a>
                                    <a onClick={(e) => this.sort_table('value', 'desc')}
                                       className={sortingMethod === "value-desc" ? " has-text-success" : " has-text-grey-light"}>
                                        <i className="fas fa-caret-down fa-2x"/>
                                    </a>
                                </div>
                                <div className="coupon-filters__type">
                                    <strong>По типу</strong>
                                    <div className="select">
                                        <select className="coupon-filters__select" onChange={this.sort_by_type} defaultValue={0}>
                                            <option value={0}>Все типы</option>
                                            {types.map((type, i) => <option key={i}
                                                                            value={type.id}>{type.name}</option>)}
                                        </select>
                                    </div>
                                </div>
                            </div>
                                :null}
                        </div>
                        <div className="coupons">
                        {render_table.map((row, i) =>
                            <div key={row.id} className="coupon box is-rounded">
                                <h3 className="coupon__code title is-5 has-text-info">
                                    {row.code}
                                </h3>
                                <h4 className="coupon__type title is-5">
                                    {row['type']['name']}
                                </h4>
                                <div className="coupon__description">
                                    <strong className="is-marginless">Описание</strong>
                                    <p className="">{row.description}</p>
                                </div>
                                <div className="coupon__price has-text-centered">
                                    <strong>Цена</strong>
                                    <p className="has-text-success">{row.price}</p>
                                </div>
                                <div className="coupon__actual_price has-text-centered">
                                    <strong>Без купона</strong>
                                    <p className="has-text-danger">{row.actual_price}</p>
                                </div>
                                <div className="coupon__value has-text-centered">
                                    <strong>Выгода</strong>
                                    <p className="has-text-success">
                                        {this.calculate_value(row['price'], row['actual_price'])}
                                    </p>
                                </div>
                                {row.extra?<div className="coupon__extra">
                                    <strong>Важно</strong>
                                    <p className="has-text-danger">{row.extra}</p>
                                </div>:null}

                            </div> )}
                        </div>
                    </MediaQuery>
                </div>
            }
            </div>
        )
    }
}
if (document.getElementById('table')) {
    ReactDOM.render(<CouponsTable />, document.getElementById('table'));
}
