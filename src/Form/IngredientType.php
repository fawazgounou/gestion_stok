namespace App\Form;
use App\Entity\Ingredient;
use App\Validator\IngredientQuantitys;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
class IngredientType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
$builder
->add('nom', TextType::class, [
'label' => 'Nom'
])
->add('photo', FileType::class, [
'label' => 'Photo',
'required' => false,
])
->add('quantity', IntegerType::class, [
'label' => 'Quantit´e',
'constraints' => [
new IngredientQuantitys(), // Application du validateur
,→ personnalis´e
],
])
->add('save', SubmitType::class, [
'label' => 'Ajouter Ingr´edient'
]);
}
public function configureOptions(OptionsResolver $resolver): void
{
$resolver->setDefaults([
'data_class' => Ingredient::class,
]);
}
}