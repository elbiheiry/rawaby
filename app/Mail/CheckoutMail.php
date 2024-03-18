<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckoutMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($productname ,$qty ,$price ,$kind ,$type ,$cutting ,$packing ,$head ,$comments ,$subtotal,$minced ,$weight, $name ,$city ,$phone, $address , $receive ,$payment)
    {
        $this->productname = $productname;
        $this->qty = $qty;
        $this->price = $price;
        $this->kind = $kind;
        $this->type = $type;
        $this->cutting = $cutting;
        $this->packing = $packing;
        $this->head = $head;
        $this->comments = $comments;
        $this->subtotal = $subtotal;
        $this->name = $name;
        $this->minced = $minced;
        $this->weight = $weight;
        $this->city = $city;
        $this->phone = $phone;
        $this->address = $address;
        $this->receive = $receive;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.mail.order' ,[
            'productname' => $this->productname ,
            'productqty' => $this->qty ,
            'productprice' => $this->price ,
            'productkind' => $this->kind ,
            'producttype' => $this->type ,
            'productcutting' => $this->cutting ,
            'productpacking' => $this->packing ,
            'producthead' => $this->head,
            'productcomments' => $this->comments ,
            'productsubtotal' => $this->subtotal ,
            'productminced' => $this->minced,
            'productweight' => $this->weight,
            'username' => $this->name ,
            'usercity' => $this->city ,
            'userphone' => $this->phone ,
            'useraddress' => $this->address ,
            'userreceive' => $this->receive ,
            'userpayment' => $this->payment
        ])
            ->subject('طلب جديد')
            ->from('info@rawabey-alqasim.com' , 'طلب جديد')
            ->bcc('elbiheiry2@gmail.com');
    }
}
