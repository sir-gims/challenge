import {useState, useEffect} from "react";
const axios = require('axios').default;
function ClickMe() {
    let [counter, setCounter] = useState(0);
    useEffect(() => {
        axios.get('http://homestead.test/api/counter'
        //     , {
        //     params: {
        //         ID: 12345
        //     }
        // }
        )
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            })
            // .then(function () {
            //     // always executed
            // });
    });
    const incrementCount = () => {
        // Update state with incremented value
        setCounter(counter + 1);
    };
    return (
            <div>
                <h1>{counter}</h1>
                <button onClick={incrementCount}>Click me</button>
            </div>
    );
}

export default ClickMe;
