<?php 

    require_once 'db_connect.php';
    
    //an array to display response
    $response = array();
    
    //if it is an api call 
    //that means a get parameter named api call is set in the URL 
    //and with this parameter we are concluding that it is an api call

    if(isset($_GET['apicall'])){
        
        switch($_GET['apicall']){ 
            
            case 'login':
                //for login we need the username and password 
                if(isTheseParametersAvailable(array('username', 'password'))){
                    //getting values 
                    $username = $_POST['username'];
                    $password = $_POST['password']; 
                    
                    //creating the query 
                    $stmt = $conn->prepare("SELECT id, fullname, email, gender FROM users WHERE email = ? AND password = ? and access_login='1'");
                    $stmt->bind_param("ss",$username, $password);
                    
                    $stmt->execute();
                    
                    $stmt->store_result();
                    
                    if($stmt->num_rows > 0){
                        
                        $stmt->bind_result($id, $fullname, $email, $gender);
                        $stmt->fetch();
                        
                        $user = array(
                            'id'=>$id, 
                            'username'=>$fullname, 
                            'email'=>$email,
                            'gender'=>$gender
                        );

                         $_SESSION['login_user'] = $id;
                        
                        $response['error'] = false; 
                        $response['message'] = 'Login successfull'; 
                        $response['user'] = $user; 
                    }else{
                        //if the user not found 
                        $response['error'] = false; 
                        $response['message'] = 'Invalid username or password';
                    }
                }
            break; 
            
            default: 
                $response['error'] = true; 
                $response['message'] = 'Invalid Operation Called';
        }
    }else{
        //if it is not api call 
        //pushing appropriate values to response array 
        $response['error'] = true; 
        $response['message'] = 'Invalid API Call';
    }
    
    //displaying the response in json structure 
    echo json_encode($response);
   
    function isTheseParametersAvailable($params){
        foreach($params as $param){
            if(!isset($_POST[$param])){
                return false; 
            }
        }
        return true; 
    }


    ?>