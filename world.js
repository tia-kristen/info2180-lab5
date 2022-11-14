window.onload = () => {
    const lookupBtn = document.querySelector('#lookup');
    const lookupCitiesBtn = document.querySelector('#lookup-cities');
    const input = document.querySelector('#country');
    const result = document.querySelector('#result');

    lookupBtn.addEventListener('click', async (e) => {
        e.preventDefault();
        let country = input.value;
        let response = await fetch(`world.php?query=${country}`);

        if(response.status === 200){
            let data = await response.text();
            result.innerHTML = data;
        } else {
            alert("There was a problem processing your request.");
        }
        
    })

    lookupCitiesBtn.addEventListener('click', async (e) => {
        e.preventDefault();
        let country = input.value;
        let response = await fetch(`world.php?query=${country}&lookup=cities`);

        if(response.status === 200){
            let data = await response.text();
            result.innerHTML = data;
        } else {
            alert("There was a problem processing your request.");
        }
    })
}
