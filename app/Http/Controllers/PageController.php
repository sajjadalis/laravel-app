<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        $title = "A Cool Blog With Laravel";
        $subtitle = "Get Things Done Smoothly";
        return view('pages.home')->with(['title' => $title, 'subtitle' => $subtitle]);
    }

    public function about() {
        $title = "About";
        $subtitle = "This is about page";
        $body = "<p>About Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id lorem in tortor egestas tincidunt quis sit amet est. Sed mattis augue quis nisl fringilla, ac feugiat sem semper. Nam egestas eleifend arcu.</p><p>Donec rutrum, justo at pellentesque pulvinar, justo arcu pellentesque nisi, sed tincidunt diam ex et lectus. In eu mauris posuere, porta erat sit amet, efficitur mi. In elementum cursus neque, id pulvinar tellus. Cras volutpat porta est, vitae fringilla magna bibendum et. Praesent quis rutrum orci. In sit amet tellus nec arcu mollis ultricies. Maecenas id nunc sed lectus dapibus hendrerit. Vivamus facilisis augue sed nibh posuere aliquam. Quisque velit leo, sollicitudin ut vulputate sed, blandit quis enim.</p>";

        return view('pages.about')->with(['title' => $title, 'subtitle' => $subtitle, 'body' => $body]);
    }

    public function services() {
        $title = "Services";
        $subtitle = "This is services page";
        $body = "<p>Services Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id lorem in tortor egestas tincidunt quis sit amet est. Sed mattis augue quis nisl fringilla, ac feugiat sem semper. Nam egestas eleifend arcu.</p><p>Donec rutrum, justo at pellentesque pulvinar, justo arcu pellentesque nisi, sed tincidunt diam ex et lectus. In eu mauris posuere, porta erat sit amet, efficitur mi. In elementum cursus neque, id pulvinar tellus. Cras volutpat porta est, vitae fringilla magna bibendum et. Praesent quis rutrum orci. In sit amet tellus nec arcu mollis ultricies. Maecenas id nunc sed lectus dapibus hendrerit. Vivamus facilisis augue sed nibh posuere aliquam. Quisque velit leo, sollicitudin ut vulputate sed, blandit quis enim.</p>";

        return view('pages.about')->with(['title' => $title, 'subtitle' => $subtitle, 'body' => $body]);
    }

}
