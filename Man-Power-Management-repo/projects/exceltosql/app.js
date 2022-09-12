const http = require('http');
const port = 3306;
const server = http.createServer(function(req, res){
    res.write("hello");
    res.end();
})
server.listen(port, function(error) {
    if(error){
        console.log("Error");
    }
    else{
        console.log("Serevr:"+port);
    }
})