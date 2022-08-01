import {useState, useEffect} from "react";
const axios = require('axios').default;
function ClickMe() {
    let [counter, setCounter] = useState(0);
    useEffect( () => {
         axios.get('http://homestead.test/api/counter')
            .then(function (response) {
                console.log(response.data)
                setCounter(response.data.clicksTally)
            })
            .catch(function (error) {
                console.log(error);
            })
    }, []);
    const incrementCount = () => {
        // Update state with incremented value
        setCounter(counter + 1);
        // update backend value

    };
    const postCountValue = () => {
        /*
        - counter
        */
        axios.post('http://homestead.test/api/counter', {
            counter,

        })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    };
    return (
            <div>
                <h1>{counter}</h1>
                <button onClick={incrementCount}>Click me</button>
            </div>
    );
}

export default ClickMe;
