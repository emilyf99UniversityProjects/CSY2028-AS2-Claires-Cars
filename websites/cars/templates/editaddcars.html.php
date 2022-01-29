<?php
//calls the admin sub navigation bar so the user can go back to the admin menu easily
require 'leftsectionadmin.html.php';
?>

<section class = "right">
    <h2> Update or Add a Car</h2>

    <!--enctype has to be included as images are saved on this form -->
    <form action="" method="POST" enctype="multipart/form-data">

         <!--Hidden as the user does not need to see the ID.
        However if the hiddens are not included then form will not post due to missing data 
        ID is on an auto incrementer-->
        <input type= "hidden" name= "cars[id]" value="<?=$cars['id'] ?? ''?>"/>
        <label>Name: </label><input type = "text" name="cars[name]" value="<?=$cars['name'] ?? ''?>" required/>
        
        <!-- If there is a file that has the same name as the car ID number, 
        then that file is echoed as the cars picture-->
        <?php
        if (isset($car) && file_exists('images/cars' . $cars['id'] . '.jpg')) 
        {
            echo '<img src="images/cars' . $cars['id'] . '.jpg/>';
        }
        ?>
        <label>Car Image: </label>

        <input type="file" name="image" />
        
        <label>Manufacturer: </label>
        <select name="cars[manufacturerId]">
		<?php
            /*finds each manufacturer in the table and compares their IDs, if there is a match the 
            name is displayed in a drop down for the user to choose from. If statement is to select the current
            option in the edit and else is to display the other options that can be selected*/
			foreach ($manufacturers as $manufacturer) {
				if ($cars['manufacturerId'] == $manufacturer['id']) {
				    echo '<option selected="selected" value="' . $manufacturer['id'] . '">' . $manufacturer['name'] . '</option>';
				}
				else {
					echo '<option value="' . $manufacturer['id'] . '">' . $manufacturer['name'] . '</option>';	
				}
						
            }
                
        ?>
        </select>
        <label>Price: </label><input type = "text" name="cars[price]" value="<?=$cars['price'] ?? ''?>" required/>
        <label>Description: </label><input type = "text" name="cars[description]" value="<?=$cars['description'] ?? ''?>" required/>
        <label>Before Price: </label><input type = "text" name="cars[beforeprice]" value="<?=$cars['beforeprice'] ?? ''?>"/>
        <label>Mileage: </label><input type = "text" name="cars[mileage]" value="<?=$cars['mileage'] ?? ''?>" required/>
        <label>Engine: </label><input type = "text" name="cars[engine]" value="<?=$cars['engine'] ?? ''?>"required/>

        <!--Checkbox has the value of 1 as when ticked this is the value used in the database to mark it is archived
            There is a hidden value underneath that has the same name as the checkbox with the value 0. This sets the 
            value to 0 (as in non-archived) if the checkbox is not selected -->
        <label>Archived: </label><input type = "checkbox" name="cars[archived]" value= 1 />
        <input type = "hidden" name="cars[archived]" value= 0 />

		</div>
        </tr>
	 	</li>
        </table>
        <input type= "submit" name = "submit" value = "Save" />
    </form>
</section>