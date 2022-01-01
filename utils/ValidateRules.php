<?php 
       
        const DEFAULT_VALIDATION_ERRORS = [
                'required' => 'Please enter the %s',
                'length5'=>'Please enter the %s have 5 characters',
                "ChooseCategory"=>"Please choose category for the book",
                "number"=>"The year of public must be integer number",
                'email' => 'The %s is not a valid email address',
                'min' => 'The %s must have at least %s characters',
                'max' => 'The %s must have at most %s characters',
                'between' => 'The %s must have between %d and %d characters',
                'same' => 'The %s must match with %s',
                'alphanumeric' => 'The %s should have only letters and numbers',
                'secure' => 'The %s must have between 8 and 64 characters and contain at least one number, one upper case letter, one lower case letter and one special character',
                'unique' => 'The %s already exists',
            ];


       function validate(array $data,array $fields,array $messages =[]) : array{
                //implement something
                $errors =[];
                //
                $split = fn($str,$seperator) =>array_map('trim',explode($seperator,$str));

                 // get the message rules
                $rule_messages = array_filter($messages, fn($message) =>  is_string($message));
    
                // overwrite the default message
                $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $rule_messages);

                foreach ($fields as $field => $option){
                        //get the rules of the field
                        $rules = $split($option,'|');

                        foreach($rules as $rule){
                                //run a validation on each rule
                                $params = [];
                                if(strpos($rule,':')){
                                        [$rule_name,$param_str] = $split($rule,':');
                                        $params = $split($param_str,',');
                                }else{
                                        $rule_name = trim($rule);
                                }
                                $fn = 'is_'.$rule_name;
                                if(is_callable(($fn))){
                                        $pass = $fn($data,$field,...$params);
                                        if(!$pass){
                                                $errors[$field] = sprintf(
                                                $messages[$field][$rule_name] ?? $validation_errors[$rule_name],
                                                $field,
                                                ...$params
                                        );
                                        }
                                }
                        }
                }
                return $errors;
       }

       /**
        *  Return true if a string is not empty
        * @param array $data
        * @param string $field
        * @return $field
        */
       function is_required(array $data,string $field):bool{
               return isset($data[$field]) && trim($data[$field]) !== '';
               return isset($data[$field]) && trim($data[$field]) !== '';

       }

       function is_email(array $data,string $field):bool{
               if(empty($data[$field])){
                       return true;
               }
               //get data by field
               return filter_var($data[$field],FILTER_VALIDATE_EMAIL);
       }
       function is_number(array $data,string $field):bool{
               if(!isset($data[$field])){
                       return true;
               }
               ;

               return is_numeric($data[$field]);
       }
       function is_length5(array $data,string $field,int $max):bool{
                if (!isset($data[$field])) {
                        return true;
                }
                
                return mb_strlen($data[$field]) == $max;
       }
       function is_ChooseCategory(array $data,string $field):bool{
               if( strcmp($data[$field],"")){
                       return true;
               }
               return false;
       }
       function is_alphanumeric(array $data, string $field): bool
        {
        if (!isset($data[$field])) {
                return true;
        }

        return ctype_alnum($data[$field]);
        }

?>