$(document).ready(function() {

    // Scroll Effect

    let mainBtn = $('.main-btn');

    let aboutSection = $('#about-area');
    let productSection = $('#product-area');
    let contactSection = $('#contact-area');

    let scrollTo = '';


    $(mainBtn).click(function() {

        let btnId = $(this).attr('id');

        if(btnId == 'about-menu') {
            scrollTo = aboutSection;
        } else if(btnId == 'product-menu') {
            scrollTo = productSection;
        } else {
            scrollTo = contactSection;
        }

        $([document.documentElement, document.body]).animate({
            scrollTop: $(scrollTo).offset().top
        }, 1000);

    });



    // Request à API do OpenWeather

    const api = {
        key: "55c3a97572d9aabdec814998051a800d",
        base: "https://api.openweathermap.org/data/2.5/",
        lang: "pt-br",
        units: "metric"
    }

    const container_img = document.querySelector('.container-img');
    const weather_t = document.querySelector('.weather');
    const temperature_t = document.querySelector('.temp');
    const humidity_t = document.querySelector('.humidity');
    const wind_t = document.querySelector('.wind');


    request('Votuporanga')

    function request(city) {
        fetch(`${api.base}weather?q=${city}&lang=${api.lang}&units=${api.units}&APPID=${api.key}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP Error: Status ${response.status}`)
                }
                return response.json();
            })
            .catch(error => {
                alert(error.message)
            })
            .then(response => {
                displayResults(response)
            });
    }

    function displayResults(weather) {

        let iconName = weather.weather[0].icon;
        container_img.innerHTML = `<img src="icons/${iconName}.png">`;

        var translation = {
            'few clouds': 'poucas nuvens',
            'light rain': 'chuva leve',
            'scattered clouds': 'nuvens dispersas',
            'overcast clouds': 'nublado',
            'moderate rain': 'chuva moderada',
            'heavy intensity rain': 'chuva de forte intensidade',
            'broken clouds': 'nuvens quebradas',
            'clear sky': 'céu limpo',
          };

        let weather_d = translation[weather.weather[0].description];

        const arr = weather_d.split(" ");

        for (var i = 0; i < arr.length; i++) {
            arr[i] = capitalizeFirstLetter(arr[i]);

        }

        const weather_d_capitalized = arr.join(" ");
        weather_t.innerText = weather_d_capitalized

        let temperature = `${Math.round(weather.main.temp)}`
        temperature_t.innerHTML = temperature + `°C`;

        let humidity = `${Math.round(weather.main.humidity)}`
        humidity_t.innerHTML = humidity + `%`;

        let wind = weather.wind.speed;
        wind_t.innerHTML = wind + `m/s`;

    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

});
