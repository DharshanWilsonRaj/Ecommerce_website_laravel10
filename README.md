DB:design For ecommerce


Admin-> (seeder) -> Name , Email, password , Role_id 
users -> name, email ,password , role_id, address-> nullabel , phone  
products -> product_name , product_discription , product_image , price ,stocks  
orders ->  product_id , product_name , product_image, products_price, customer_name , customer_email , customer_address , price , totalCount , Date status 



pages -> 
******For Admin

headers ->{
 company name ,
  profile :   name , image ,  Account setting:update Accounts details , logout
 }

sideBar->{
orders ->{product_id , product_name , product_image, products_price, customer_name , customer_email , customer_address , price , totalCount , Date status }
Products ->{add , remove , edit , listing  ->  product_name , product_discription , product_image , price ,stocks  }
 Customer ->{Add , listing -> name, email , phone , address }

}


Login and Register -> comman


**** customer ->{
Products -> name , discription , images , prices , stocks 
cart -> cart item , discription ,  details , selected quantity , 
checkout ->  customer details , Products details , price , payment method
customerDetails -> update customer profile
}



