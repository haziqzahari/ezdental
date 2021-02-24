function showInput(){
    var x = document.getElementById("case_type").value;
    console.log(x === "Other");

    if(x === "Other"){
        document.getElementById('other_input').style = "block";
    }else{
        document.getElementById('other_input').style = "none";
    }
}
