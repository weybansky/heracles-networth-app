var sum = 0;
var inputArray = [];
function getArray(){
    var x = document.getElementsByClassName('asset');
    for(var i = 0; i < x.length ; i++ ){
        inputArray[i] = Number(x[i].value);
    }
    inputArray = inputArray
    return inputArray;

}
function inputValidate(){
    var arr = []
    arr = getArray();
    var initsum=0;
    for(var i = 0; i < arr.length ; i++ ){
        console.log(arr[i]);
        initsum += Number(arr[i]);
        console.log("");
    }
    sum = initsum;
    console.log(sum);
    console.log("");
    displaySum(sum);
}
function displaySum(sum){
    document.getElementById('assetSum').innerHTML = sum.toFixed(2);
}

function monitor(e) {
    
}