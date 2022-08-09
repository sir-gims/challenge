import {useState, useEffect} from "react";
const axios = require('axios').default;
function ClickMe() {
    let [counter, setCounter] = useState(0);
    let [animator, setAnimator] = useState(0);

    useEffect( () => {
         axios.get('http://homestead.test/api/counter')
            .then(function (response) {
                setCounter(response.data.clicksTally)
            })
            .catch(function (error) {
                console.log(error);
            })
    }, []);
    const incrementCount = () => {
        /*Update state with incremented value
        * update backend value
        * setTimeout callback it's just for animation purposes
        * */
        setAnimator(counter + 1);
        setTimeout(() => {
            setCounter(counter + 1);
            postCountValue();
        }, 200);

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
                <div className="contains-counter">
                    <h1 key={animator} className='animate'>{counter}</h1>
                </div>
                <button onClick={incrementCount}>+</button>
            </div>
    );
}

export default ClickMe;
