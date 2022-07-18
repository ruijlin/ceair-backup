function getTranportId(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'php_validation/package_controll.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getNo='+true);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('transportation_id').innerHTML = this.responseText;
            }else{
                document.getElementById('transportation_id').innerHTML = "";
            }
        }	
    }
}

function getTouristSpot(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'php_validation/package_controll.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getTour='+true);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('tourist_spot').innerHTML = this.responseText;
            }else{
                document.getElementById('tourist_spot').innerHTML = "";
            }
        }	
    }
}

function getResidency(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'php_validation/package_controll.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('residency_ID='+true);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('residency').innerHTML = this.responseText;
            }else{
                document.getElementById('residency').innerHTML = "";
            }
        }	
    }
}

function getData(){
    getTranportId();
    getTouristSpot();
    getResidency();
}

function validatePackage(){
    var name = document.getElementById('name').value;
    var type = document.getElementById('package_type').value;
    var price = document.getElementById('price').value;
    var transportation_id = document.getElementById('transportation_id').value;
    var tourist_spot = document.getElementById('tourist_spot').value;
    var residency = document.getElementById('residency').value;

    if(name != null && type != null && price != null && transportation_id != null && tourist_spot != null && residency != null){
        var obj ={
            "name" : name,
            "type" : type,
            "price" : price,
            "transportation_id" : transportation_id,
            "tourist_spot" : tourist_spot,
            "residency" : residency
        }
    
        var packObj = JSON.stringify(obj);
    
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', 'php_validation/package_controll.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('package='+packObj);
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    alert("Package Added");
                    window.location = "packageView.php";
                }
                else{
                    alert("Package Not Added");
                }
            }	
        }
    }
    
}

function getpackageList(page){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'php_validation/package_controll.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getPackageList='+page);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('bodyText').innerHTML = this.responseText;
            }else{
                document.getElementById('bodyText').innerHTML = "";
            }
        }	
    }
}

function deletePackage(pack_id){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'php_validation/package_controll.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('pack_id='+pack_id);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                alert("Package Removed");
                getpackageList();
            }else{
                alert("Package Not Removed\n" + this.responseText);
                getpackageList();
            }
        }	
    }
}

function search(){
    var data = document.getElementById('search').value;
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'php_validation/package_controll.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('data='+data);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('bodyText').innerHTML = this.responseText;
            }else{
                document.getElementById('bodyText').innerHTML = "";
            }
        }	
    }
}

function getpackageById(package_id){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'php_validation/package_controll.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('package_id='+package_id);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                var obj = JSON.parse(this.responseText);
                var price = obj.price;
                document.getElementById('name').innerHTML = obj.name;
                document.getElementById('type').innerHTML = obj.type;
                // document.getElementById('price').innerHTML = obj.price;
                document.getElementById('priceInp').value = obj.price;
                document.getElementById('priceInp').disabled = true;
                document.getElementById('tran_type').innerHTML = obj.tran_type;
                document.getElementById('res').innerHTML = obj.res;
                document.getElementById('tSpot').innerHTML = obj.destination;
            }else{
                document.getElementById('bodyText').innerHTML = "";
            }
        }	
    }
}


// function checkBooking(user_id){
//     var rowCount = "";
//     var xhttp = new XMLHttpRequest();
//     xhttp.open('POST', 'php_validation/package_controll.php', true);
//     xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//     xhttp.send('check='+user_id);
//     xhttp.onreadystatechange = function (){
//         if(xhttp.readyState == 4 && xhttp.status == 200){
//             var valid = check(xhttp.responseText);
//             return valid;
//         }	
//     }
// }

// function check(data){
//     if(data != ""){
//     return false;
//     }
//     else{
//         return true;
//     }
// }

function confirm(pack_id,user_id){
    var nights = document.getElementById('night').value;
    var ret_date = document.getElementById('ret_date').value;
    var dep_date = document.getElementById('dep_date').value;
    var no_people = document.getElementById('no_people').value;
    var price = document.getElementById('priceInp').value;

    var trip = {
        "dep_date" : dep_date,
        "ret_date" : ret_date,
        "no_people" : no_people,
        "night" : nights,
        "pack_id" : pack_id,
        "user_id" : user_id,
        "price" : price
    }
    var tripObj = JSON.stringify(trip);
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'php_validation/package_controll.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send("tripObj="+tripObj);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                alert("Package Booked\n\n\n" + this.responseText);
                window.location = "publihome2.php";
            }else{
                document.getElementById('bodyText').innerHTML = "";
            }
        }	
    }
    
}

function getcus(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'php_validation/package_controll.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getCus='+true);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('bodyText').innerHTML = this.responseText;
            }else{
                document.getElementById('bodyText').innerHTML = "";
            }
        }	
    }
}
