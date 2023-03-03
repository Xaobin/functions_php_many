/*
const ccc={"items":[
{ "id": 1, "name": "AAA", "created_at": "data1" },
{ "id": 2, "name": "BBB", "created_at": "data2" },
{ "id": 12, "name": "CCC", "created_at": "data3" },
{ "id": 13, "name": "DDD", "created_at": "data4" }
]};
*/   

//ccc.map((item, keyx) => {console.log(item.id); })
//let jason = `{"result":true, "count":42}`;
let titles={ id:{title:'ID', typer:'id'},
               name:{title:'Name', typer:'text'},
               image:{title:'Image', typer:'image'},
               created_at:{title:'Created', typer:'date'},
               operations:{title:'default', typer:'collname'},
               };

let usersx= [ { "id": 1,
      "first_name": "Robert",
      "last_name": "Schwartz",
      "email": "rob23@gmail.com"
    },
    { "id": 2,
      "first_name": "Lucy",
      "last_name": "Ballmer",
      "email": "lucyb56@gmail.com"
    },
    { "id": 3,
      "first_name": "Anna",
      "last_name": "Smith",
      "email": "annasmith23@gmail.com"
    },
    { "id": 4,
      "first_name": "Robert",
      "last_name": "Brown",
      "email": "bobbrown432@yahoo.com"
    },
    { "id": 5,
      "first_name": "Roger",
      "last_name": "Bacon",
      "email": "rogerbacon12@yahoo.com"
    }
];


//
///*
function compareTitles(tfields,keyx){
    tfields.forEach((k, i) => {
        //console.log(reftitles[k]);
        if (tfields[i]==keyx){
            return 1
        }    
        
    });
    return 0;
}

let neovar=[];
let elem={};
var aid=0;
let titlefields = Object.keys(titles);
usersx.forEach(jobj => {
        Object.entries(jobj).forEach(([khey, vall]) => {
            //console.log(`${key} ${value}`);
            //console.log(khey+" "+vall);
            //if (khey==)
               
            titlefields.forEach((kk,ii)=>{
                if (titles[kk].typer=="id")and(titlefields[kk]==khey){
                    aid=vall;
                }    
                if (titlefields[kk]==khey){
                    elem[khey]=vall;
                }  
                if (titles[kk].typer=="collname"){
                 elem[]   
                }    
            }); 
           neovar.push(elem);
           elem={};
           //console.log(jobj[khey]);
            //console.log(jobj.id+" "+jobj.first_name);
            //if (compareTitles(titlefields,khey)==true ){}    
        });
       // if (titlefields.operations.title=="default"){
       //     elem['operation']=jobj['id'];
       // }   
        // Object.entries(elem).forEach(([kk, vv]) => {console.log("____"+kk+" "+vv);  });    
        console.log(elem);
        
    });
//*/    
console.log("-------------------");
//jason=JSON.parse(jason);
//titles=JSON.parse(titles);

/*
- - - - - - - - - - - - - - - - - - -
titlefields.forEach(function (entry) 
{ console.log(entry); }); //return name image created_at operations
console.log(titles.id.title); //return ID
console.log(titles.id.typer); //return id
console.log(titlefields); //return [ 'id', 'name', 'image', 'created_at', 'operations' ]
- - - - - - - - - - - - - - - - - - -
*/

///*
 titlefields.forEach((k, i) => {
       // console.log(titles[k]+" ");
       console.log(titlefields[i]); //ret: id name,created_at, operations
       //console.log("typer: "+titles[k].typer); //ret: typer: id ... typer: collname
    });
//*/    
