import React, { Component } from 'react';

class AdminLayout extends Component {

    constructor(props){
        super(props)
        this.state = {
            userIn: false
        }
    }

    componentWillMount(){
       
        let cache = localStorage.staleState;
        if (cache && typeof JSON.parse(cache) === 'object') {

            this.setState({userIn: true})
          
        }else{
            return(
               window.location.replace('/guest')
            )
        }

    }

    render() {
        return (
            <div>
                Welcome in
            </div>
        );
    }
}

export default AdminLayout;