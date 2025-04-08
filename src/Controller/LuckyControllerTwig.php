<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerTwig extends AbstractController
{
    #[Route("/lucky", name: "lucky")]
    public function number(): Response
    {
        $hour = sprintf("%02d", random_int(1, 12));
        $minute = sprintf("%02d", random_int(0, 59));
        $am_pm = ["AM", "PM"];
        $random_am_pm = array_rand($am_pm);

        $tarot_card = tarotDeck();
        $card_position = tarotCardPosition();

        $data = [
            'hour' => $hour,
            'minute' => $minute,
            'noon' => $am_pm[$random_am_pm],
            'card_position' => $card_position,
            'tarot' => $tarot_card['img'],
            'alt_text' => $tarot_card['alt'],
            'card_title' => $tarot_card['title'],
            'info_upright' => $tarot_card['upright'],
            'info_reverse' => $tarot_card['reversed'],

        ];

        return $this->render('lucky.html.twig', $data);
    }
}

function tarotDeck()
{
    $tarot_deck = [
        [
            "img" => "img/tarot-deck/The-fool.jpg",
            "alt" => "The fool tarot card",
            "title" => "The Fool",
            "upright" => "Beginnings, innocence, spontaneity, a free spirit",
            "reversed" => "Holding back, recklessness, risk-taking"
        ],
        [
            "img" => "img/tarot-deck/The-magician.jpg",
            "alt" => "The magician tarot card",
            "title" => "The Magician",
            "upright" => "Manifestation, resourcefulness, power, inspired action",
            "reversed" => "Manipulation, poor planning, untapped talents"
        ],
        [
            "img" => "img/tarot-deck/The-high-priestess.jpg",
            "alt" => "The high priestess tarot card",
            "title" => "The High Priestess",
            "upright" => "Intuition, sacred knowledge, divine feminine, the subconscious mind",
            "reversed" => "Secrets, disconnected from intuition, withdrawal and silence"
        ],
        [
            "img" => "img/tarot-deck/The-empress.jpg",
            "alt" => "The empress tarot card",
            "title" => "The Empress",
            "upright" => "Femininity, beauty, nature, nurturing, abundance",
            "reversed" => "Creative block, dependence on others"
        ],
        [
            "img" => "img/tarot-deck/The-emperor.jpg",
            "alt" => "The emperor tarot card",
            "title" => "The Emperor",
            "upright" => "Authority, establishment, structure, a father figure",
            "reversed" => "Domination, excessive control, lack of discipline, inflexibility"
        ],
        [
            "img" => "img/tarot-deck/The-hierophant.jpg",
            "alt" => "The hierophant tarot card",
            "title" => "The Hierophant",
            "upright" => "Spiritual wisdom, religious beliefs, conformity, tradition,institutions",
            "reversed" => "Personal beliefs, freedom, challenging the status quo"
        ],
        [
            "img" => "img/tarot-deck/The-lovers.jpg",
            "alt" => "The lovers tarot card",
            "title" => "The Lovers",
            "upright" => "Love, harmony, relationships, values alignment, choices",
            "reversed" => "Self-love, disharmony, imbalance, misalignment of values"
        ],
        [
            "img" => "img/tarot-deck/The-chariot.jpg",
            "alt" => "The chariot tarot card",
            "title" => "The Chariot",
            "upright" => "Control, willpower, success, action, determination",
            "reversed" => "Self-discipline, opposition, lack of direction"
        ],
        [
            "img" => "img/tarot-deck/Strength.jpg",
            "alt" => "Strength tarot card",
            "title" => "Strength",
            "upright" => "Strength, courage, persuasion, influence, compassion",
            "reversed" => "Inner strength, self-doubt, low energy, raw emotion"
        ],
        [
            "img" => "img/tarot-deck/The-hermit.jpg",
            "alt" => "The hermit tarot card",
            "title" => "The Hermit",
            "upright" => "Soul-searching, introspection, being alone, inner guidance",
            "reversed" => "Isolation, loneliness, withdrawal"
        ],
        [
            "img" => "img/tarot-deck/The-wheel-of-fortune.jpg",
            "alt" => "The wheel of fortune tarot card",
            "title" => "Wheel Of Fortune",
            "upright" => "Good luck, karma, life cycles, destiny, a turning point",
            "reversed" => "Bad luck, resistance to change, breaking cycles"
        ],
        [
            "img" => "img/tarot-deck/Justice.jpg",
            "alt" => "Justice tarot card",
            "title" => "Justice",
            "upright" => "Justice, fairness, truth, cause and effect, law",
            "reversed" => "Unfairness, lack of accountability, dishonesty"
        ],
        [
            "img" => "img/tarot-deck/The-hanged-man.jpg",
            "alt" => "The hanged man tarot card",
            "title" => "The Hanged Man",
            "upright" => "Pause, surrender, letting go, new perspectives",
            "reversed" => "Delays, resistance, stalling, indecision"
        ],
        [
            "img" => "img/tarot-deck/Death.jpg",
            "alt" => "Death tarot card",
            "title" => "Death",
            "upright" => "Endings, change, transformation, transition",
            "reversed" => "Resistance to change, personal transformation, inner purging"
        ],
        [
            "img" => "img/tarot-deck/Temperance.jpg",
            "alt" => "Temperance tarot card",
            "title" => "Temperance",
            "upright" => "Balance, moderation, patience, purpose",
            "reversed" => "Imbalance, excess, self-healing, re-alignment"
        ],
        [
            "img" => "img/tarot-deck/The-devil.jpg",
            "alt" => "The devil tarot card",
            "title" => "The Devil",
            "upright" => "Shadow self, attachment, addiction, restriction, sexuality",
            "reversed" => "Releasing limiting beliefs, exploring dark thoughts, detachment"
        ],
        [
            "img" => "img/tarot-deck/The-tower.jpg",
            "alt" => "The tower tarot card",
            "title" => "The Tower",
            "upright" => "Sudden change, upheaval, chaos, revelation, awakening",
            "reversed" => "Personal transformation, fear of change, averting disaster"
        ],
        [
            "img" => "img/tarot-deck/The-star.jpg",
            "alt" => "The star tarot card",
            "title" => "The Star",
            "upright" => "Hope, faith, purpose, renewal, spirituality",
            "reversed" => "Lack of faith, despair, self-trust, disconnection"
        ],
        [
            "img" => "img/tarot-deck/The-moon.jpg",
            "alt" => "The moon tarot card",
            "title" => "The Moon",
            "upright" => "Illusion, fear, anxiety, subconscious, intuition",
            "reversed" => "Release of fear, repressed emotion, inner confusion"
        ],
        [
            "img" => "img/tarot-deck/The-sun.jpg",
            "alt" => "The sun tarot card",
            "title" => "The Sun",
            "upright" => "Positivity, fun, warmth, success, vitality",
            "reversed" => "Inner child, feeling down, overly optimistic"
        ],
        [
            "img" => "img/tarot-deck/Judgement.jpg",
            "alt" => "Judgement tarot card",
            "title" => "Judgement",
            "upright" => "Judgement, rebirth, inner calling, absolution",
            "reversed" => "Self-doubt, inner critic, ignoring the call"
        ],
        [
            "img" => "img/tarot-deck/The-world.jpg",
            "alt" => "The world tarot card",
            "title" => "The World",
            "upright" => "Completion, integration, accomplishment, travel",
            "reversed" => "Seeking personal closure, short-cuts, delays"
        ]
    ];

    $random_nr = array_rand($tarot_deck);
    return $tarot_deck[$random_nr];
}

function tarotCardPosition()
{
    $position = ["upright", "downright"];

    $random_position = array_rand($position);

    return $position[$random_position];
}
