window.onload = function() 
{
    var context = "cities";

    var btn = document.getElementsByTagName("button")[0];

    btn.addEventListener("click",function(element)
    {
        element.preventDefault();
        httpRequest = new XMLHttpRequest();

        var country = document.querySelector('input').value;
        var url = "world.php?country=" + country;
        context = "cities" + "1";

        httpRequest.onreadystatechange = loadData;
        httpRequest.open('GET', url);
        
        httpRequest.send();
    });

    var btn2 = document.getElementsByTagName("button")[1];

    btn2.addEventListener("click",function(element)
    {
        element.preventDefault();
        httpRequest = new XMLHttpRequest();

        var country = document.querySelector('input').value;
        context = "cities";
        var url = "world.php?country=" + country + "&context=" + context;

        httpRequest.onreadystatechange = loadData;
        httpRequest.open('GET', url);
        
        httpRequest.send();
    });

    function loadData()
    {
        if (httpRequest.readyState === XMLHttpRequest.DONE) 
        {
            if (httpRequest.status === 200) 
            {
                var response = httpRequest.responseText;
                var result = document.querySelector('#result');
                result.innerHTML = response;
            } 
            else 
            {
                alert('There was a problem with the request.');
            }
        }
    }
};