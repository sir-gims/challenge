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
        /*Update state with incremented value
        * update backend value
        * */
        postCountValue();
        setCounter(counter + 1);
    };
    const postCountValue = () => {
        axios.post('http://homestead.test/api/counter', {
            clicksTally: counter
        })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    };
    return (
            <div className='container'>
                <h1>{counter}</h1>
                <button onClick={incrementCount}>+</button>
            </div>
    );
}

export default ClickMe;
