#todo



FOOD :
      -Authentification (Done)
      -Front end 
                - //TODO: Account menu (youssef) Done
                -Cart menu (nourhaine)
                -Authentification forms ( login , register , reset pass , forget) (nourhaine)
                - TODO: CRUD Products (youssef)Done 
                - TODO: CRUD Categories (youssef)Done 
                - TODO: CRUD Commande  (youssef)Done 
                - TODO: Modifier account (youssef)
                -Commande status (nourhaine)
                -Contact form (nourhaine)
      -backend
                -Admin
                      -Login/logout (youusef)
                      -Register // Optional
                      -CRUD Products (nourhaine)Done
                      -CRUD Categories (nourhaine)Done
                      -CRUD commande (nourhaine)
                -Client 
                      -Login/Register/ResetPass/logout (done)
                      -Modifier account (youusef)
                                  -Modifier ( Nom , Password , Adresse , Num)
                                  -Remove account
                      -Add to cart (youssef)
                                  -Quantity
                      -Remove from cart (youssef)
                      -Pass Commande (youssef)
                      -View commande status (nourhaine)
                      -Send contact mail (nourhaine)
Clients : CREATE TABLE `clients` (
          `ID` int(11) NOT NULL,
          `name` text NOT NULL,
          `email` varchar(255) NOT NULL,
          `phone` int(8) NOT NULL,
          `password` varchar(255) NOT NULL,
          `adresse` varchar(255) NOT NULL,
          `statu` int(2) NOT NULL DEFAULT 0,
          `email_verification_link` varchar(255) NOT NULL,
          `email_verified_at` timestamp NULL DEFAULT NULL,
          `recovery` bigint(20) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Admin table : id, name , email, phone, password,
Product table : id , category_id ,title , description , price ,image, 
category table : id , name , description , 

cart table : id , product id , user id , order id , product quantity 
order table : id , user id , shipping adress , email , approved ,total



