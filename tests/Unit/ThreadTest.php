<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadTest extends TestCase
{
	use DatabaseMigrations;

	protected $thread;

	function test_a_thread_has_replies()
	{
		$thread = create('App\Thread');

		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $thread->replies);
	}

	/** @test */
	function a_thread_has_a_creator()
	{
		$thread = create('App\Thread');

		$this->assertInstanceOf('App\User', $thread->creator);
	}

	/** @test */
	public function a_thread_can_add_a_reply()
	{
		$thread = create('App\Thread');
		$thread->addReply([
			'body' => 'Foobar',
			'user_id' => 1
		]);

		$this->assertCount(1, $thread->replies);
	}
}