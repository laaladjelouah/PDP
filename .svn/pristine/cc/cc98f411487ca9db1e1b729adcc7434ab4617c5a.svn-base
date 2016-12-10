<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class registerTest extends TestCase {

    use DatabaseTransactions;

    public function testRegisterOK() {

        // All information are valid
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1993-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/home');

        // We don't verify the password here because is the hash of the password
        // that is stored in database
        $this->seeInDatabase('users',
                array(
            'lastname' => 'bob',
            'firstname' => 'bob',
            'birthdate' => '1993-12-05',
            'email' => 'bob.bob@hotmail.com',
            'phoneNumber' => '0426834215',
        ));
        $this->seeInDatabase('CreditCard',
                array(
            'card_owner' => 'Bobbob',
            'credit_card_number' => '1236544795412635',
            'expiration_date' => '2016-07',
            'cvv_code' => '145',
        ));
    }

    public function testRegisterFailLastname() {
        // The field lastame should only contain alphabetic characters
        $this->visit('/register')
                ->type('1234', 'lastname')
                ->type('bob', 'firstname')
                ->type('1993-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // The help blokcs that the user should see 
        $this->seeInElement('span',
                'Le champ Nom doit seulement contenir des lettres.');


        // The field lastame can't contain more than 30 cheracters
        $this->visit('/register')
                ->type('azeazeaeaeazeazeaeaeazeazeaeaeu', 'lastname')
                ->type('bob', 'firstname')
                ->type('1993-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // The help blokcs that the user should see 
        $this->seeInElement('span',
                'Le texte de Nom ne peut contenir plus de 30 caractères.');
    }

    public function testRegisterFailFirstname() {
        // The field lastame should only contain alphabetic characters
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('12348', 'firstname')
                ->type('1993-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // The help blokcs that the user should see 
        $this->seeInElement('span',
                "Le champ Prénom doit seulement contenir des lettres.");


        // The field lastame can't contain more than 30 cheracters
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('azeazeaeaeazeazeaeaeazeazeaeaeu', 'firstname')
                ->type('1993-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // The help blokcs that the user should see 
        $this->seeInElement('span',
                "Le texte de Prénom ne peut contenir plus de 30 caractères.");
    }

    public function testRegisterFailEmailAdress() {
        // The email field is not correct
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1993-12-05', 'birthdate')
                ->type('dqdqdqs@qsdqs', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // The help blokcs that the user should see 
        $this->seeInElement('span',
                "Le champ Adresse e-mail doit être une adresse email valide.");

        // The email field can only contain less than 50 characters
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1993-12-05', 'birthdate')
                ->type('fdqdqdqsolfdqfdqdqdqsolfdqdqdqsolfdqdqdqsolf@qdqdqdqso.fr',
                        'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // The help blokcs that the user should see 
        $this->seeInElement('span',
                "Le texte de Adresse e-mail ne peut contenir"
                . " plus de 50 caractères.");
    }

    /* In this test, all fields are empty so will just test empty fields
     * once. For example the field "email" is empty, other test will perform
     * on the field "email" below, but the empty test will only perfom in this
     * method once.
     */

    public function testRegisterNoFillFields() {
        // All fields are empty
        $this->visit('/register')
                ->type('', 'lastname')
                ->type('', 'firstname')
                ->type('', 'birthdate')
                ->type('', 'email')
                ->type('', 'password')
                ->type('', 'password_confirmation')
                ->type('', 'phoneNumber')
                ->type('', 'credit_card_number')
                ->type('', 'card_owner')
                ->type('', 'expiration_date')
                ->type('', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // The help blokcs that the user should see    
        $this->seeInElement('span', 'Le champ Nom est obligatoire.')
                ->seeInElement('span', 'Le champ Prénom est obligatoire.')
                ->seeInElement('span',
                        'Le champ Date de naissance est obligatoire.')
                ->seeInElement('span',
                        'Le champ Adresse e-mail est obligatoire.')
                ->seeInElement('span', 'Le champ Mot de passe est obligatoire.')
                ->seeInElement('span',
                        'Le champ Numéro de téléphone est obligatoire.')
                ->seeInElement('span',
                        'Le champ Numéro de carte est obligatoire.')
                ->seeInElement('span',
                        'Le champ Nom du porteur est obligatoire.')
                ->seeInElement('span',
                        "Le champ Date d'expiration est obligatoire.")
                ->seeInElement('span',
                        'Le champ Code de sécurité est obligatoire.');
    }

    public function testRegisterFailThenRepopulateData() {
        // Expiration date is not correct 
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('1993-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // User data are repopulated in their respective fields
        $this->seeInField('lastname', 'bob')
                ->seeInfield('firstname', 'bob')
                ->seeInfield('birthdate', '1992-12-05')
                ->seeInfield('email', 'bob.bob@hotmail.com')
                ->seeInfield('password', NULL)
                ->seeInfield('password_confirmation', NULL)
                ->seeInfield('phoneNumber', '0426834215')
                ->seeInfield('credit_card_number', '1236544795412635')
                ->seeInfield('card_owner', 'Bobbob')
                ->seeInfield('expiration_date', '1993-07')
                ->seeInfield('cvv_code', '145');
    }

    public function testRegisterFailPassword() {
        // The password is too short
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bob', 'password')
                ->type('bob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le texte Mot de passe doit contenir au "
                . "moins 6 caractères.");

        // The password is too long
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaao', 'password')
                ->type('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaao',
                        'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le texte de Mot de passe ne peut "
                . "contenir plus de 30 caractères.");

        // Password field and password confirmation field are different
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaao', 'password')
                ->type('bobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le champ de confirmation Mot de passe ne "
                . "correspond pas.");
    }

    public function testRegisterFailPhoneNumber() {
        // The phone number is too long
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('04268342156', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le champ Numéro de téléphone doit avoir 10 chiffres.");

        // The phone number is too short
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('042', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le champ Numéro de téléphone doit avoir 10 chiffres.");

        // The phone number field should contain a numeric value
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('qsdsdqsqsd', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le champ Numéro de téléphone doit avoir 10 chiffres.");
    }

    public function testRegisterFailCreditCardNumber() {
        // The credit card number is too long
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('12365447954126358', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le champ Numéro de carte doit avoir 16 chiffres.");

        // The credit card number is too short
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('123654479', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le champ Numéro de carte doit avoir 16 chiffres.");

        // Credit card field should contain only digits
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1993-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('qsdsqdq', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le champ Numéro de carte doit avoir 16 chiffres.");
    }

    public function testRegisterFailCardOwner() {
        // The field card owner should only contain alphabetic characters
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1993-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('123', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // The help blokcs that the user should see 
        $this->seeInElement('span',
                'Le champ Nom du porteur doit seulement '
                . 'contenir des lettres.');


        // The field card owner can't contain more than 30 cheracters
        $this->visit('/register')
                ->type('azeazeaeaeazeazeaeaeazeazeaeaeu', 'lastname')
                ->type('bob', 'firstname')
                ->type('1993-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('BobbobBobbBobbobBobbBobbobBobbp', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // The help blokcs that the user should see 
        $this->seeInElement('span',
                'Le texte de Nom du porteur ne peut '
                . 'contenir plus de 30 caractères.');
    }

    public function testRegisterFailExpirationDate() {
        // Expiration date is not correct 
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('0426834215', 'phoneNumber')
                ->type('1236544795412635', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('1993-07', 'expiration_date')
                ->type('145', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le champ Date d'expiration doit être une "
                . "date postérieure à aujourd'hui.");
    }

    public function testRegisterFailCvvCode() {
        // The cvv code should only contain digits
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('04268342156', 'phoneNumber')
                ->type('12365447954126358', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('ds', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le champ Code de sécurité doit avoir 3 chiffres.");

        // The cvv code is too long
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('04268342156', 'phoneNumber')
                ->type('12365447954126358', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('15', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see 
        $this->seeInElement('span',
                "Le champ Code de sécurité doit avoir 3 chiffres.");

        // The cvv code is too long
        $this->visit('/register')
                ->type('bob', 'lastname')
                ->type('bob', 'firstname')
                ->type('1992-12-05', 'birthdate')
                ->type('bob.bob@hotmail.com', 'email')
                ->type('bobbobbob', 'password')
                ->type('bobbobbob', 'password_confirmation')
                ->type('042', 'phoneNumber')
                ->type('123654479', 'credit_card_number')
                ->type('Bobbob', 'card_owner')
                ->type('2016-07', 'expiration_date')
                ->type('1458', 'cvv_code')
                ->press('Inscription')
                ->seePageIs('/register');

        // Help block that the user should see         
        $this->seeInElement('span',
                "Le champ Code de sécurité doit avoir 3 chiffres.");
    }

}
