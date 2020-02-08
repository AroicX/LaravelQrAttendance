import React, { Component } from 'react';
import QRScanner from 'qr-code-scanner';


class index extends Component {

  componentWillMount(){
    console.log('mounted...');

    QRScanner.initiate({
      onResult: (result) => { 
        alert(result)
       },
      timeout: 120000,
  });

  }


  render() {
    return (
      <div className="VideoScanner">
        Scan Dog Tag
      </div>
    );
  }
}

export default index;

