<?php

namespace Louvre\TicketingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table(name="booking")
 * @ORM\Entity(repositoryClass="Louvre\TicketingBundle\Repository\BookingRepository")
 */
class Booking
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
    * @var integer
    * 
    * @ORM\Column(name="nb_tickets", type="integer")
    */
    private $nbTickets = 0;

    /**
    * @ORM\OneToMany(targetEntity="Louvre\TicketingBundle\Entity\Ticket", mappedBy="Booking", cascade={"persist", "remove"})
    */
    private $tickets;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tickets = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set Ticket
     */
    public function setTicket($tickets)
    {
        foreach ($tickets as $ticket) {
            $ticket->setBooking($this);
        }
        
        $this->tickets = $tickets;
        
        return $this;
    }

    /**
     * Get Ticket
     */
    public function getTicket()
    {
        return $this->tickets;
    }

    /**
     * Add ticket
     *
     * @param \Louvre\TicketingBundle\Entity\Ticket $ticket
     *
     * @return Booking
     */
    public function addTicket(\Louvre\TicketingBundle\Entity\Ticket $ticket)
    {
        $ticket->setBooking($this);
        
        $this->tickets[] = $ticket;
        
        return $this;
    }

    /**
     * Remove ticket
     *
     * @param \Louvre\TicketingBundle\Entity\Ticket $ticket
     */
    public function removeTicket(\Louvre\TicketingBundle\Entity\Ticket $ticket)
    {
        $this->tickets->removeElement($ticket);
    }

    /**
     * Get tickets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTickets()
    {
        return $this->tickets;
    }
    
    /**
     * Set nbTickets
     */
    public function setNbTickets($nb) 
    {
        $this->nbTickets = $nb;
    }
    
    /**
     * Get nbTickets
     *
     * @return integer $nbTickets
     */
    public function getNbTickets() 
    {
        return $this->nbTickets;
    }
    
    public function increaseTicket() {
        $this->nbTickets++;
    }
    
    public function decreaseTicket() {
        $this->nbTickets--;
    }
}
