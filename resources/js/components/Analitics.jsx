import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Analitics extends Component {
    constructor(props) {
        super(props);
    }
    componentDidMount(){
        axios.get('/api/coupon_copies').then(resp=>{
            //this.setState({types:resp.data.data});
            console.log(resp.data);
        });
    }
    render() {
        return (
            <section className="container">
                Дарова
            </section>
        );
    }
}
if (document.getElementById('analitics')) {
    ReactDOM.render(<Analitics />, document.getElementById('analitics'));
}