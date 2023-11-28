<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Answer
 *
 * @property int $id
 * @property int $question_id
 * @property string $answer
 * @property int|null $position
 * @property string|null $drag_text
 * @property int|null $is_correct
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $0
 * @property-read \App\Models\Question $question
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereDragText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereIsCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperAnswer {}
}

namespace App\Models{
/**
 * App\Models\Audio
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Audio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audio query()
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperAudio {}
}

namespace App\Models{
/**
 * App\Models\Content
 *
 * @property int $id
 * @property int $lesson_id
 * @property array $title
 * @property array $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lesson $lesson
 * @method static \Illuminate\Database\Eloquent\Builder|Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperContent {}
}

namespace App\Models{
/**
 * App\Models\Image
 *
 * @property int $id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperImage {}
}

namespace App\Models{
/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property int $modul_id
 * @property array $title
 * @property int $type_lesson_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Content> $contents
 * @property-read int|null $contents_count
 * @property-read \App\Models\TypeLesson|null $lesson_type
 * @property-read \App\Models\Modul $modul
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Result> $results
 * @property-read int|null $results_count
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereModulId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTypeLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperLesson {}
}

namespace App\Models{
/**
 * App\Models\Modul
 *
 * @property int $id
 * @property array $title
 * @property array $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lesson> $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|Modul newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Modul newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Modul query()
 * @method static \Illuminate\Database\Eloquent\Builder|Modul whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modul whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modul whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modul whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|Modul whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder|Modul whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modul whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperModul {}
}

namespace App\Models{
/**
 * App\Models\Notification
 *
 * @property int $id
 * @property array $title
 * @property array|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperNotification {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property string $tarif
 * @property int $month
 * @property string $payment
 * @property string $price
 * @property string $paid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTarif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperOrder {}
}

namespace App\Models{
/**
 * App\Models\Question
 *
 * @property int $id
 * @property array $title
 * @property string $questionable_type
 * @property int $questionable_id
 * @property int $question_type_id
 * @property array|null $help
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Answer> $answers
 * @property-read int|null $answers_count
 * @property-read \App\Models\Lesson $lesson
 * @property-read \App\Models\QuestionType $questionType
 * @property-read \App\Models\Quiz|null $quiz
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereHelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperQuestion {}
}

namespace App\Models{
/**
 * App\Models\QuestionType
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @property-read int|null $questions_count
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuestionType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperQuestionType {}
}

namespace App\Models{
/**
 * App\Models\Quiz
 *
 * @property int $id
 * @property array $title
 * @property array $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Result> $results
 * @property-read int|null $results_count
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quiz whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperQuiz {}
}

namespace App\Models{
/**
 * App\Models\Result
 *
 * @property int $id
 * @property int $user_id
 * @property string $resultable_type
 * @property int $resultable_id
 * @property string $started_at
 * @property string $complated_at
 * @property-read int|null $questions_count
 * @property int $correct_questions_count
 * @property int $incorrect_questions_count
 * @property int $is_correct
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @method static \Illuminate\Database\Eloquent\Builder|Result newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Result newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Result query()
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereComplatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereCorrectQuestionsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereIncorrectQuestionsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereIsCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereQuestionsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereResultableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereResultableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperResult {}
}

namespace App\Models{
/**
 * App\Models\TypeLesson
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lesson> $lessons
 * @property-read int|null $lessons_count
 * @method static \Illuminate\Database\Eloquent\Builder|TypeLesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeLesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeLesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeLesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeLesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeLesson whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeLesson whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperTypeLesson {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string $phone
 * @property string|null $password
 * @property string|null $date
 * @property string $verification_code
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Question> $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVerificationCode($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

