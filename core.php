<?php 
    class Companies{

        private $id;
        private $lat;
        private $lng;
        private $companies;
        private $newArray;


        function setId($id){
            $this->id = $id;
        }

        function getId(){
            return $this->id;
        }

        function setLat($lat){
            $this->lat = $lat;
        }

        function getLat(){
            return $this->lat;
        }

        function setLng($lng){
            $this->lng = $lng;
        }

        function getLng(){
            return $this->lng;
        }


        
        
        public function getCompanies(){
            $url = 'https://serwis.ferroli.com.pl/include/classes/ajax/get-companies.php';
    
            $companies = file_get_contents($url);

            
            $companies = json_decode($companies);
            $companiesArraySliced = array_slice($companies, 0, 10);
            $this->companiesArraySliced = $companiesArraySliced;



            $companies = json_encode($companiesArraySliced);
            $companies = json_encode(json_decode($companies, true));

            $this->companies = $companies;

            return $this->companies;

            
        }

        public function updateCompaniesLatLng($id){
            $url = 'https://serwis.ferroli.com.pl/include/classes/ajax/get-companies.php';
    
            $companies2 = file_get_contents($url);

            
            $companies2 = json_decode($companies2);
            $companiesArraySliced = array_slice($companies2, 0, 10);
            $this->companiesArraySliced = $companiesArraySliced;

            

            $counter = count($this->companiesArraySliced);
            for($i = 0; $i <= $counter-1; $i++){
                if($this->companiesArraySliced[$i]->id == $id){
                    $this->companiesArraySliced[$i]->lat = $this->getLat();
                    $this->companiesArraySliced[$i]->lng = $this->getLng();

                    var_dump($this->companiesArraySliced[$i]);
                }
                array_push($this->newArray, $this->companiesArraySliced[$i]);
            }

            var_dump($this->newArray);

            
            

        }
    }
?>