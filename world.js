window.onload = () => {
    const lookupBtn = document.querySelector('#lookup');
    const input = document.querySelector('#country');
    const result = document.querySelector('#result');

    lookupBtn.addEventListener('click', async (e) => {
        e.preventDefault();
        let query = input.value;
        let response = await fetch(`world.php?query=${query}`);

        if(response.status === 200){
            let data = await response.text();
            result.innerHTML = data;
        } else {
            alert("There was a problem processing your request.");
        }
    })
}
