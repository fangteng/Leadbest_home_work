# Leadbest_home_work
Leadbest home work

一般上利用laravel開發專案主要會將程式拆分為
Controller <- 負責處理請求參數驗證， 回傳結果
Services <- 處理程式上的商業邏輯
Repositories <- 資料庫

情境題
請依資料表及下列條件實作 PHP Class 程式碼功能。可以使用您熟悉的 PHP 框架或是 Pure PHP 都可以，請註明使用 Class 內的哪個 function 作為主要呼叫入口，期望實作的核心程式碼邏輯中，可以考量資料完整性：
a.	由M0001使用者轉帳給M0002使用者 N 塊錢。( 其中M0001、
M0002 以及 N 為可帶入之動態變數 )
b.	需將轉帳交易紀錄儲存於資料表中

以上考題寫在UserBalanceController
主要是將更改匯款者與接收匯款者資料更新，已經記錄


2.	請設計一個blog的   API  及  資料表  滿足以下功能：
●	假設前提
○	網域：https://test-api.leadbest.io
○	前後端分離的實作模式

●	資料庫部分 (請使用 RDBMS 設計)
○	文章 
    資料庫名稱 -> articles
○	文章 tag (一篇文章有多個 tags)
    資料庫名稱 -> tags
○	文章分類 (一篇文章只有一個分類)
○	作者

●	API 必須要完成以下相關的功能
○	取得文章列表
○	取得單篇文章
○	新增文章
○	修改文章
○	刪除文章
I.	請協助提供以下相關的資訊來讓我們了解你會怎麼進行相關的系統設計
○	列出資料表的名稱、重要欄位、index與表之間的關聯
○	列出你會設計哪些 API ，以下說明 API 設計的必要資訊
■	每支 API 的網址
■	Request http method
■	Request payload
■	Response 範例內容
■	(Optional) API 使用 Restful Design Pattern 設計尤佳
II.	請試著規劃完成以上功能所需的時間安排，包含 API，資料表，API 文件，測試，程式碼審核等所需項目。
III.	假設部分 API 的存取需要通過身份驗證者才能使用，你會如何設計身份驗證機制？
答：目前大多數會使用JWT來處理驗證的部分



3.	有一個線上影片串流服務，服務購買採用訂閱方案 (Subscription)，請問你會如何設計該訂閱方案的到期機制？
I.	需求說明
○	其過期機制運作原理主要是透過定期排程觸發，指令主要邏輯是找出所有訂閱已經到期的帳號，將帳號的資料庫啟用欄位 (status) 設定成 false
○	訂閱方案分別有以下方式
■	By Month
■	By Years
○	使用者可能來自不同多個國家
○	資料表實作請使用 RDBMS 進行設計
I.	請提供以下的設計，也可以文字說明設計的假設前提與思路
○	Database table schemas (寫出關鍵的 tables 即可)
○	你預期的排程頻率為何？
○	請寫出在排程指令內，你預期用來判斷訂閱過期的 SQL Queries (based on 上述你提供的 table schemas)

