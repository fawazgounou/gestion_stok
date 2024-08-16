?php
// src/Form/RecetteType.php
namespace App\Form;
use App\Entity\Recette;
use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
class RecetteType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
$builder
->add('nom', TextType::class)
->add('ingredients', CollectionType::class, [
'entry_type' => IngredientType::class,
'allow_add' => true,
'allow_delete' => true,
]);
}
public function configureOptions(OptionsResolver $resolver): void
{
$resolver->setDefaults([
'data_class' => Recette::class,
]);
}
}