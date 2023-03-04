let brands=[ { "id": 4,
        "name": "Ford",
        "image": "images/6Qjcmw2CYxui3nBm8KxwBmAmIuK7Y697Y5B6hXDQ.jpg",
        "created_at": "2023-01-17T14:03:29.000000Z",
        "updated_at": "2023-01-21T14:57:19.000000Z",
        "ref_car_models": [
            {
                "id": 3,
                "brand_id": 4,
                "name": "Ford Ecosport",
                "image": "images/carmodels/M65igxyfUbsphrh9a0p5cZ3QPQvmYpLe7uF8IOhU.jpg",
                "doors": 4,
                "seats": 4,
                "air_bag": 1,
                "abs": 1,
                "created_at": "2023-01-21T18:47:53.000000Z",
                "updated_at": "2023-01-21T18:47:53.000000Z"
            },
            {
                "id": 4,
                "brand_id": 4,
                "name": "Ford ka",
                "image": "images/carmodels/Y5p1uBKpqNAvSiZqfR2oR1cB1MvtSt0hKVvfOvZh.jpg",
                "doors": 4,
                "seats": 4,
                "air_bag": 1,
                "abs": 1,
                "created_at": "2023-01-21T18:48:06.000000Z",
                "updated_at": "2023-01-21T18:48:06.000000Z"
            }
        ]
    },
    {
        "id": 12,
        "name": "Volks",
        "image": "images/AmlO3rVPyhH2IR8gOANcYun0zS1dk0sfdQT3IW4Y.png",
        "created_at": "2023-02-25T19:49:44.000000Z",
        "updated_at": "2023-02-25T19:49:44.000000Z",
        "ref_car_models": []
    },
    {
        "id": 13,
        "name": "Solaris",
        "image": "images/KTVnplu3KTH6noZ5ufEkJtXWBvDWIQElmDXBJX2X.png",
        "created_at": "2023-02-25T20:45:16.000000Z",
        "updated_at": "2023-02-25T20:45:16.000000Z",
        "ref_car_models": []
    },
    {
        "id": 14,
        "name": "Dodge",
        "image": "images/YPuWvf1MtsewI9y2NK6NsDDuG7VjBSWkG2WZsFMG.jpg",
        "created_at": "2023-02-25T22:00:19.000000Z",
        "updated_at": "2023-02-25T22:00:19.000000Z",
        "ref_car_models": []
    },
    {
        "id": 15,
        "name": "AAA",
        "image": "images/hIS8575ZHfCx0vozwh7w6UbzdmjiLINq8jalMdPR.png",
        "created_at": "2023-02-25T23:35:12.000000Z",
        "updated_at": "2023-02-25T23:35:12.000000Z",
        "ref_car_models": []
    }
];



let usersx= [ { "id": 1,
      "name": "Robert",
      "last_name": "Schwartz",
      "email": "rob23@gmail.com"
    },
    { "id": 2,
      "name": "Lucy",
      "last_name": "Ballmer",
      "email": "lucyb56@gmail.com"
    },
    { "id": 3,
      "name": "Anna",
      "last_name": "Smith",
      "email": "annasmith23@gmail.com"
    },
    { "id": 4,
      "name": "Robert",
      "last_name": "Brown",
      "email": "bobbrown432@yahoo.com"
    },
    { "id": 5,
      "name": "Roger",
      "last_name": "Bacon",
      "email": "rogerbacon12@yahoo.com"
    }
];


let titles={ id:{title:'ID', typer:'id'},
               name:{title:'Name', typer:'text'},
               image:{title:'Image', typer:'image'},
               created_at:{title:'Created', typer:'date'},
               ref_car_models:{title:'Reference',typer:'text'},
               config:{title:'', amountcolls: 1 },
               };

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
var nid=0;
let titlefields = Object.keys(titles);
brands.forEach(jobj => {
        Object.entries(jobj).forEach(([khey, vall]) => {
         
           
              //console.log(titlefields.length);
            const inkey = titlefields.includes(khey);
            if (inkey==true){
            titlefields.forEach((kk,ii)=>{ //id name,created_at, config
             
                //console.log(".."+kk+".."+ii);
                if ((titles[kk].typer=="id")&&(nid==0))
                { nid=vall; elem[khey]=vall; } 
                   
                if (ii>0)   {
               // if ( (titlefields.length<ii+1)&&(ii>0) )  {
                    elem[khey]=vall;
                    
                }  
                 
            }); 
           
          }
        
        });
        let tmp=nid;
        let lele=titles.config.amountcolls;
        for (var i = 1; i <= lele; i++) {
            elem['nid']=nid;    
            if (i>1){ elem['nid'+i]=nid; }
        }    
        
         neovar.push(elem);
                elem={};
                nid=0;
              
        // Object.entries(elem).forEach(([kk, vv]) => {console.log("____"+kk+" "+vv);  });    
    });

neovar.forEach((ell)=>{ console.log(ell); })
console.log("-------------------");
console.log(titles.config.amountcolls);

//*/    
//jason=JSON.parse(jason);
//titles=JSON.parse(titles);

//console.log(titlefields[0]); //ret : id
/*
- - - - - - - - - - - - - - - - - - -
titlefields.forEach(function (entry) 
{ console.log(entry); }); //return name image created_at operations
console.log(titles.id.title); //return ID
console.log(titles.id.typer); //return id
console.log(titlefields); //return [ 'id', 'name', 'image', 'created_at', 'operations' ]
- - - - - - - - - - - - - - - - - - -
*/

/*
 titlefields.forEach((k, i) => {
       // console.log(titles[k]+" ");
       //console.log(titlefields[i]); //ret: id name,created_at, operations
       //console.log("typer: "+titles[k].typer); //ret: typer: id ... typer: 
    });
*/    
