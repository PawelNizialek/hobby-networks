const x = 9;
let y;
let p;
(()=> {
    y=8;
    initialize();
    z = add(x,y);
    console.log("Result: "+add(z,p));
})();

function add(a=2, b=2){
    return a+b;
}
function initialize(c=5){
    y=c;
}

const timeoutID = setTimeout(()=>console.log('Cool'), 0);
console.log('Code');
clearTimeout(timeoutID);

const string = 'str';
if(!!string){
    console.log(string);
}