
//very starting
let fileselected;
document.getElementById("filess").addEventListener("change",(event)=>{
    fileselected=event.target.files[0];
})


//VARIABLE VALUES
var myarray=[],myarray1=[],myarray2=[],colName=[],heading=[],ValueAtEx=[];

const stringToSum = str => [...str||"A"].reduce((a, x) => a += x.codePointAt(0), 0);

//find the Alpabet values in the number
function testing(s){
    result = 0
    for(var B=0;B<s.length;B++){
        result = result * 26;
        result = result + stringToSum(s[B]) - 65 + 1;
    }
    return result
}

// excel number to alpabets 
function printString(n){
    var string = []
    var i = 0
    while (n > 0){
        rem = n % 26
        if (rem == 0){
            string[i] = 'Z'
            i = i + 1
            n = Math.floor(n / 26) - 1
        }
        else{
            string[i] = String.fromCharCode((rem - 1) + stringToSum('A'))
            i = i + 1
            n = Math.floor(n / 26)
        }
    }
    string = string.reverse()
    return string.join("")
}

//onclick upload
let data,workbook;
var namesS;
document.getElementById("upload").addEventListener("click",()=>{
    if(fileselected){
        let fileread=new FileReader();
        fileread.readAsBinaryString(fileselected);
        fileread.onload=(ev)=>{
            data = ev.target.result;
            workbook = XLSX.read(data,{type:"binary"});
            namesS=workbook.SheetNames;
            var o="<tr>"
            for(var i=0;i<namesS.length;i++)
            {
                o+="<td><button onclick=nextStep(this) id="+namesS[i]+">"+namesS[i]+"</button></td>";
            }
            o+="</tr>"
            document.getElementById("SheetSelect").innerHTML=o;
            
        }
    }   
});
function nextStep(n){
    myarray=[],myarray1=[],myarray2=[],colName=[],heading=[],ValueAtEx=[];
    document.getElementById("headAttri").style.display='block'
    document.getElementById('headerTable').innerHTML=null;
    document.getElementById('less').style.display='none'
    document.getElementById('less').innerHTML='Less';
    console.log(n);
    document.getElementById("mytable").innerHTML=null;
    namesS=n.innerHTML
    var s=workbook.Sheets[namesS];

    // object key only fetched
    var obj=Object.keys(s),ref=s["!ref"];

    // just fetch the string end value number
    var myarray=ref.split(":");

    for(var i=0;i<2;i++){
        var e=myarray[i],x="",x1="";
        for (var j=0;j<e.length;j++){
            if(isNaN(e[j])){
                x=x+e[j];
            }
            else{
                x1=x1+e[j]
            }
        }
        myarray1.push(x)
        myarray2.push(x1)
    }
    //just process 
    var newobj=obj.slice(1,obj.length-1)

    colName=[];
    for(i=testing(myarray1[0]);i<=testing(myarray1[1]);i++){
        colName.push(printString(i))
    }
    // create the excel to json table
    // create the heading
    var tableval="";
    for(var j=1;j<=colName.length;j++){
        var className=colName[j-1]+myarray2[0];
        if(newobj.includes(className)){
            var d=s[className]["w"];
            heading.push(d)
        }
        else{
            heading.push("def"+j);
        }
    }
    //create the values
    for(var i=parseInt(myarray2[0])+1;i<=parseInt(myarray2[1]);i++){
        tableval+="<tr>"
        var tempArr=[]
        for(var j=1;j<=colName.length;j++){
            var className=colName[j-1]+i;
            if(newobj.includes(className)){
                var d=s[className]["w"];
                tempArr.push(d);
                tableval+="<td class=tdpass "+className+" id=Col"+j+">"+d+"</td>\n"
            }
            else{
                tempArr.push(0);
                tableval+="<td class=tdpass "+className+" id=Col"+j+">&nbsp;</td>\n"
            }
        }
        ValueAtEx.push(tempArr);
        tableval+="</tr>";
    }
    document.getElementById("mytable").innerHTML=tableval;
    console.log(heading,ValueAtEx)
}
//onclick headAttri
document.getElementById("headAttri").addEventListener("click",(e)=>{
    tableval="";
    for(var i=0;i<heading.length;i++)
    {
        var task="headMain"+(i+1),task1="headDT"+(i+1),task2="headSIZE"+(i+1);
        tableval+="<tr>\n<td><input value='"+heading[i]+"' type=text id="+task+"></td>\n";
        tableval+="<td><input value='varchar' type=text id="+task1+"></td>\n";
        tableval+="<td><input value='100' type=number id="+task2+"></td>\n";
        tableval+="</tr>";
    }
    console.log()
    document.getElementById('less').style.display='block';
    document.getElementById('headerTable').innerHTML=tableval;
    document.getElementById("headAttri").style.display='none';
})
document.getElementById('less').addEventListener("click",(e)=>{
    var dis=document.getElementById('headerTable').style.display;
    document.getElementById('less').innerHTML = (e.target.innerHTML=='Less')?'More':'Less';
    dis=(dis=='none')?'block':'none';
    document.getElementById('headerTable').style.display=dis;        
})


//data Transfer
document.getElementById('extobd').addEventListener("click",(e)=>{
    var headMain=[],headDT=[],headSIZE=[];
    var x=$("#CreNot").is(":checked");
    var DatabaseV=document.getElementById("DBname").value;
    var tables=document.getElementById("tablename").value;
    for(var i=0;i<heading.length;i++)
    {
        var task="headMain"+(i+1),task1="headDT"+(i+1),task2="headSIZE"+(i+1);
        headMain.push(document.getElementById(task).value)
        headDT.push(document.getElementById(task1).value)
        headSIZE.push(document.getElementById(task2).value)
    }
    
    fileTranfer(ValueAtEx,headMain,headDT,headSIZE,DatabaseV,tables,x);
    
});
function fileTranfer(ValueAtEx,headMain,headDT,headSIZE,DatabaseV,tables,x){
    
    var f=(x==true)?"CREATE DATABASE `"+DatabaseV+"`;":"NO"
    var temp=headMain.length-1
    var f1="CREATE TABLE `"+DatabaseV+"`.`"+tables+"`("
    for(var i=0;i<temp;i++){
        f1+="`"+headMain[i]+"` "+headDT[i]+"("+headSIZE[i]+"), "
    }
    f1+="`"+headMain[temp]+"` "+headDT[temp]+"("+headSIZE[temp]+"));"
    f2="INSERT INTO `"+DatabaseV+"`.`"+tables+"`("
    for(var i=0;i<temp;i++){
        f2+="`"+headMain[i]+"`, "
    }
    f2+="`"+headMain[temp]+"`) VALUES"
    for(var i=0;i<ValueAtEx.length;i++){
        var temp1="("
        for (var j=0;j<ValueAtEx[i].length-1;j++){
            temp1+="'"+ValueAtEx[i][j]+"', "
        }
        temp1+="('"+ValueAtEx[i][ValueAtEx[i].length-1]+"')"
        f2+=temp1+"), "
    }
    f2+=temp1+");";
    $.ajax({
        type: "POST",
        url: "exjson.php",
        data: {
            DBCreate:f,
            TBCreate:f1,
            InsertCreate:f2
        },
        success: function(data) {
            document.getElementById("temp").innerHTML=data;
        }
    });
}