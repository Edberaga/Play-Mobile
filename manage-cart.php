<?php
    session_start();
    //Request to access the page from the form
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['add_to_cart']))
        {
            if(isset($_SESSION['cart']))
            {
                $cart_items = array_column($_SESSION['cart'],'item_name');

                //Check if the item has exists in the cart
                if(in_array($_POST['item_name'],$cart_items))
                {
                    //Display message and go to previous page
                    echo"<script>alert('Item has already added to cart');
                        history.back();
                    </script>";
                }
                else{
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count]=array('item_name'=>$_POST['item_name'],
                    'item_price' => $_POST['item_price'],
                    'qty'=>1);
                
                    //Display message and go to previous page
                    echo"<script>alert('Item added');
                                history.back();
                        </script>";
                }
            }

            //If item isn't exist. then it will be added.
            else
            {
                $_SESSION['cart'][0]=array('item_name'=>$_POST['item_name'],
                'item_price' => $_POST['item_price'],
                'qty'=>1);

                //Display to tell the user that the item has been added, and went to the previous page.
                echo"<script>alert('Item added');
                            history.back();
                    </script>";
            }
        }

        //Remove product from cart
        if(isset($_POST['remove'])) {
            //create a variable call $remove_item which will be used to contain all the cart items value. 
            //the $key is as the [0] [1] [2], and the $remove_item is as [item_name], [item_price], [qty]
            foreach($_SESSION['cart'] as $key => $remove_item) 
            {
                //if there is value that has same name as 'item_name' on the session 'cart', it will remove it from the variable 'cart'
                if($remove_item['item_name']==$_POST['item_name'])
                {
                    //Resets any variable, so it will $key that contain the same item_name as from $remove_item.
                    unset($_SESSION['cart'][$key]);

                    //to returns the session 'cart-product' index value.
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    //Display message and go to previous page
                    echo"<script>
                        alert('Item removed');
                        history.back();
                    </script>";
                }
            }
        }

        //To reset the cart
        if(isset($_POST['reset'])) {
            unset($_SESSION['cart']);
            //to returns the session 'cart-product' index value.
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            //Display message and go to previous page
            echo"<script>
                alert('Cart has been Reset');
                history.back();
            </script>";
        }
    }
?>