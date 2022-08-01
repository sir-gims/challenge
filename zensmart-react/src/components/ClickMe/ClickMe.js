import {useState} from "react";

function ClickMe() {
    let [counter, setCounter] = useState(0);
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
