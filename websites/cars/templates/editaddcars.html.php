<?php
require 'leftsectionadmin.html.php';
?>

<section class = "right">
    <h2> Update or Add a Car</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type= "hidden" name= "cars[id]" value="<?=$cars['id'] ?? ''?>"/>
        <label>Name: </label><input type = "text" name="cars[name]" value="<?=$cars['name'] ?? ''?>" required/>
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
        <label>Archived: </label><input type = "checkbox" name="cars[archived]" value= 1 />

		</div>
        </tr>
	 	</li>
        </table>
        <input type= "submit" name = "submit" value = "Save" />
    </form>
</section>