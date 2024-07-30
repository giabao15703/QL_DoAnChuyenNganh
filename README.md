-  Rule Project MVC
   Controller:

*  Tên class & tên file luôn phải giống nhau
*  Tên Class luôn có "Controller" ở cuối cùng
   Ex: ProductController (Class name) -> ProductController.php (File name)
   UserController (Class name) -> UserController.php (File name)

-  Models

   + Giống Controller nhưng khác ở tên cố định là "Model"
   + Chữ cái đầu tiên luôn là chữ hoa
   Ex: UserModel (class name) -> UserModel.php (File name)
       Product Model (class name) -> ProductModel.php (File name)

-  View (Không bắt buộc nhưng nên)
   -  Tên của File View nên giống với tên method trong File View đó
      Ex: Method trong controller là index -> tên file view sẽ là index.php
   -  Tên thư mục View nên giống với controller nhưng ở dạng số nhiều
      Ex: UserController -> Folder view là users
-  Param Name
   +  controller: Qui định gọi vào controller nào. Name phải trùng tên với Controller Name
   Ex: UserController -> Param Controller: user
       ProductController -> Param Controller: product
   +  action: Qui định gọi vào method nào. Trường hợp không có -> mặc định action là index

Route: Từ sau dấu ? sẽ có tên là route 
