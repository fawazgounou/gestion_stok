use App\Validator\IngredientQuantitys;
class Ingredient
{
// ... autres champs ...
/**
* @ORM\Column(type="integer")
* @IngredientQuantitys()
*/
private $quantity;
}