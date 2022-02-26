<?php 
// variable value already define in the previous linked page
// define the content of table in a variable content
$content="<div class='profile-items'>
                <table>
                <tr>
                    <td>Name</td> <td> $fname $lname </td>
                </tr>
                <tr>
                    <td>Mobile Number</td> <td> $mob_NO </td>
                </tr>
                <tr>
                    <td>Email</td> <td>  $email</td>
                </tr>
                <tr>
                    <td>Address</td> <td> $address </td>
                </tr>
                <tr>
                    <td>Gender</td> <td> $gender </td>
                </tr>
                <tr>
                    <td>Marital Status</td> <td>  $married </td>
                </tr>
                <tr>
                    <td>State of Origin</td> <td> $state </td>
                </tr>
            
                <tr>
                    <td>hobbies</td> <td> $hobbies </td>
                </tr>
                
                
            </table>
            <form action='' method='POST'>

                <button type='submit' name='edit' id= 'edit'>Edit Profile</button>
                <button type='submit' name='cv' id= 'cv'>Upload CV<input type='file' name='' id='cvI' placeholder='Upload CV'></button>

            </form>
            </div>"
?>