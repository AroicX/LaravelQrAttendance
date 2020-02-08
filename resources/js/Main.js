import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import { BrowserRouter } from "react-router-dom";
import App from './components'
import './main.scss'

class Main extends Component {
    render() {
        return (
           <BrowserRouter >
                <App />
           </BrowserRouter>
        );
    }
}

export default Main;


if (document.getElementById('app')) {
    ReactDOM.render(<Main />, document.getElementById('app'));
}