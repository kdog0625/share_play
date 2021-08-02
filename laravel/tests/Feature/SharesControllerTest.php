<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SharesControllerTest extends TestCase
{
    use RefreshDatabase;

    ### 一般ユーザー用投稿一覧表示機能のテスト ###

    /**
     * 未ログイン時
     */
    public function testIndex()
    {
        $response = $this->get(route('shares.index'));

        $response->assertStatus(200)
            ->assertViewIs('shares.index')
            ->assertSee('新規登録')
            ->assertSee('ログイン');
    }

    /**
     * ログイン時
     */
    public function testAuthIndex()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get(route('shares.index'));

        $response->assertStatus(200)
            ->assertViewIs('shares.index')
            ->assertSee('マイページ')
            ->assertSee('ログアウト');
    }
}
