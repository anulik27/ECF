<?php
Class Animal{
    public string $id;
    public string $prenom;
    public string $etat;
    
        /**
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }
    
        /**
         * @param string $id
         */
        public function setId(string $id): void
        {
            $this->id = $id;
        }
    
/**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getEtat(): string
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat(string $etat): void
    {
        $this->etat =$etat;
}
}
?>