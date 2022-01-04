setInterval(() => {
    const request = axios.get('http://localhost/nerdygadgets/temperature_request.php');
    // Log errors if needed
    request.catch((error) => {
        console.error(error);
    });

    // Handle successful request
    request.then((response) => {

        let temperature = response.data;
        // Write string inside of ul tags.
        document.getElementById("temperature").innerHTML = "Temp: " + temperature;
    });
}, 3000);