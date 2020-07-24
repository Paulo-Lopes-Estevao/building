
        var a = document.getElementById("Dinheiro");
        var b = document.getElementById("Consultar");
        var d = document.getElementById('Transferência');
        var c = document.getElementById("deposito");
        var e = document.getElementById("two");
        var f = document.getElementById("tableform");
        var es = document.getElementById("Estrato");
        var co = document.getElementById("Conta");
        var i = document.getElementById("zero")
        var clos = document.getElementById('sair');
        var vw = document.getElementById('form')
        var be= document.getElementById("benk")
        var ba= document.getElementById("bank")
        var ok = document.getElementById("okcorrect");
        var oc = document.getElementById("okconfirm");
        

            a.addEventListener('click', Dinheiro)
            b.addEventListener('click', Consultar)
            c.addEventListener('click', deposito)
            es.addEventListener('click', Estrato)
            co.addEventListener('click', Conta)
            ok.addEventListener('click', depositoConta)


            var div = document.createElement('div')
            var div2 = document.createElement('div')
            var h1 = document.createElement('h1')
            var input = document.createElement('input')
            var form = document.createElement('form')
            var button = document.createElement('button')
            var da = document.createElement('a')
            var da2 = document.createElement('a')

function depositoConta(){
a.style.display="none"
e.style.display="none"
b.style.display="none"
d.style.display="none"
c.style.display="none"
es.style.display="none"
co.style.display="none"
clos.style.display="none"
oc.style.display="block"
oc.style.fontSize="25px";
oc.style.marginLeft= "510px";
oc.style.marginTop="-110px";

}         

            
function Dinheiro(){
    
   // a.innerText="2000.00"
   // b.innerText="4000.00"
   // c.innerText="6000.00"
   // es.innerText="20000.00"
   // co.innerText="40000.00"
    ok.style.display="none"

    
    i.innerText=""

    form.method="POST"
    form.action=""
    form.setAttribute("id","form2")
    div2.setAttribute("class","pan")
    input.setAttribute("class","input")
    button.setAttribute("class","bt ba-a")
    input.type="number";
    input.placeholder="Digit Valor";
    input.name="ribbon";
    input.required="true"
    button.textContent="OK"
    var att = f.appendChild(form)
    var put = att.appendChild(div2)
    put.appendChild(input);
    att.appendChild(button)
    

    da2.setAttribute('class','stati')
    da2.style.color="white"
    da2.style.textDecoration="none"
    da2.style.fontSize="25px";
    da2.textContent="Cancelar"
    da2.href="iconta.php"
    i.appendChild(da2);
    
    clos.style.fontSize="25px";
    clos.innerText="Confirmar"
    e.style.marginLeft="251px"
    f.style.display="block"

    d.textContent=""
    var sec = d
    da.href="index.php"
    da.setAttribute('class','stati')
    da.style.color="white"
    da.style.textDecoration="none"
    da.textContent="Back"
    sec.appendChild(da)
    div.style.display="none"
    h1.style.display="none"
    vw.style.display="none"
    ba.style.display="none"


}
     

function deposito()
{
    vw.style.display="block"
    i.innerText=""
    da.setAttribute('class','stati')
    da.style.color="white"
    da.style.textDecoration="none"
    da.style.fontSize="25px";
    da.textContent="Cancelar"
    da.href="iconta.php"
    i.appendChild(da);
    clos.style.fontSize="25px";
    clos.innerText="Confirmar"
    e.style.marginLeft="251px"
    f.style.display="block"
    div.style.display="none"
    h1.style.display="none"
    ba.style.display="block"

  
}


function Consultar()
{
    
    vw.style.display="none"
    f.style.display="block"
    div.style.display="block"
    h1.style.display="block"
    e.style.marginLeft="166px"
    var subdiv = f;
    h1.textContent="Crédito:"
    h1.style.fontSize="40px"
    h1.style.marginLeft="90px"
    div.style.width="400px"
    div.style.height="400px"
    div.style.borderRadius="7px"
    div.style.backgroundColor="#345f34"
    var subdivh1 = subdiv.appendChild(div)
    subdivh1.appendChild(h1)

    
}


function Estrato(){
    vw.style.display="none"
    f.style.display="block"
    div.style.display="block"
    h1.style.display="block"
    e.style.marginLeft="166px"
    var subdiv = f;
    h1.textContent="Status Bancário"
    h1.style.fontSize="40px"
    h1.style.marginLeft="70px"
    div.style.width="400px"
    div.style.height="400px"
    div.style.borderRadius="7px"
    div.style.backgroundColor="#345f34"
    var subdivh1 = subdiv.appendChild(div)
    subdivh1.appendChild(h1)
}

function Conta(){

    vw.style.display="none"
    f.style.display="block"
    div.style.display="block"
    h1.style.display="block"
    e.style.marginLeft="166px"
    var subdiv = f;
    h1.textContent="Status Bancário"
    h1.style.fontSize="40px"
    h1.style.marginLeft="70px"
    div.style.width="400px"
    div.style.height="400px"
    div.style.borderRadius="7px"
    div.style.backgroundColor="#345f34"
    var subdivh1 = subdiv.appendChild(div)
    subdivh1.appendChild(h1)

}

