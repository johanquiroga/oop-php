<?php

class Person {
	protected $firstName;
	protected $lastName;
	protected $birthdate;
	protected $nickname;
	protected $changedNickname = 0;
	protected $rules = [
		'birthdate' => '/^(0[1-9]|[12][0-9]|3[01])[-\/.](0[1-9]|1[012])[-\/.](19|20)\d\d$/',
		'nickname' => '/^[a-zA-Z]{2,}$/'
	];

	public function __construct($firstName, $lastName, $birthdate)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		if(preg_match_all($this->rules['birthdate'], $birthdate, $matches, PREG_PATTERN_ORDER, 0) > 0) {
			$birthdate = str_replace(['.','/'], '-', $birthdate);
			$this->birthdate = $birthdate;
		} else {
			throw new Exception("Bad birthdate, Must be dd/mm/yyyy or dd-mm-yyyy", 1);	
		}
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function setNickname($nickname)
	{
		if($this->changedNickname >= 2) { 
			throw new Exception("You can't change a nickname mora than 2 times", 1);	
		}

		if(preg_match_all($this->rules['nickname'], $nickname, $matches, PREG_PATTERN_ORDER, 0) > 0) {
			if(strcasecmp($nickname, $this->firstName) != 0 && strcasecmp($nickname, $this->lastName) != 0) {
				$this->nickname = $nickname;
				$this->changedNickname++;
			} else {
				throw new Exception("Nickname cannot be your first name or last name", 1);
			}
		} else {
			throw new Exception("The nickname has an invalid format. It must have at least 2 characters", 1);
		}
	}

	public function getNickname()
	{
		return $this->nickname;
	}

	public function getFullName()
	{
		return $this->firstName . ' ' . $this->lastName;
	}

	public function getAge()
	{
		$birthdate = explode('-', $this->birthdate);
		$currentYear = explode('-', date('d-m-Y'));

		$age = $currentYear[2] - $birthdate[2];
		if(intval($currentYear[1]) < intval($birthdate[1])) {
			$age--;
		} elseif (intval($currentYear[1]) == intval($birthdate[1])) {
			if (intval($currentYear[0]) < intval($birthdate[0])) {
				$age--;
			}
		}

		return $age;
	}
}

$person = new Person('Johan', 'Quiroga', '19-07-1995');

$person->setNickname('johanquiroga');

echo "{$person->getAge()} <br />";
echo "{$person->getNickname()} <br />";