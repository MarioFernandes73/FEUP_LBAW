------------------------------------------ ENUMS ------------------------------------------

CREATE TYPE "AuctionCategory" AS ENUM (
    'Antiquities',
    'Clothes',
    'Decoration',
    'Indoor',
    'Jewelry',
    'Outside',
    'Tools',
    'Others'
);


CREATE TYPE "AuctionState" AS ENUM (
    'Scheduled',
    'Opened',
    'Awaiting_payment',
    'Awaiting_delivery',
    'Closed',
    'Banned'
);



CREATE TYPE "AuctionType" AS ENUM (
    'Blind',
    'Dutch',
    'English'
);



CREATE TYPE "TicketCategory" AS ENUM (
    'Report',
    'Product',
    'Questions',
    'Others'
);



CREATE TYPE "UserState" AS ENUM (
    'Administrator',
    'Inactive',
    'Banned',
    'Registered',
    'Validated'
);


--@@@@@@@@@@@@@@@@@@@ ENTITY TABLES @@@@@@@@@@@@@@@@@@@--

------------------------------------------ AUCTION TABLE ------------------------------------------

CREATE TABLE "Auction" (
    "basePrice" double precision NOT NULL,
    description "char"[],
    "durationHours" integer NOT NULL,
    name "char"[] NOT NULL,
    "startingDate" timestamp with time zone NOT NULL,
    "idAuction" integer NOT NULL,
    category "AuctionCategory" NOT NULL,
    state "AuctionState" NOT NULL,
    type "AuctionType" NOT NULL,
    owner "char"[] NOT NULL,
    "currentPrice" double precision NOT NULL,
    CONSTRAINT "basePrice" CHECK (("basePrice" > (0)::double precision)),
    CONSTRAINT "positiveDuration" CHECK (("durationHours" > 0))
);

ALTER TABLE ONLY "Auction"
    ADD CONSTRAINT "Auction_pkey" PRIMARY KEY ("idAuction");

ALTER TABLE ONLY "Auction"
    ADD CONSTRAINT "Owner" FOREIGN KEY (owner) REFERENCES "User"(username);

------------------------------------------ BID TABLE ------------------------------------------
	
CREATE TABLE "Bid" (
    "idBid" integer NOT NULL,
    ammount double precision NOT NULL,
    bidder "char"[] NOT NULL,
    "idAuction" integer NOT NULL,
    date timestamp without time zone NOT NULL,
    CONSTRAINT "positiveAmmount" CHECK ((ammount > (0)::double precision))
);

ALTER TABLE ONLY "Bid"
    ADD CONSTRAINT "Bid_pkey" PRIMARY KEY ("idBid");
	
ALTER TABLE ONLY "Bid"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");

ALTER TABLE ONLY "Bid"
    ADD CONSTRAINT "Bidder" FOREIGN KEY (bidder) REFERENCES "User"(username);


------------------------------------------ COMMENT TABLE ------------------------------------------
	
CREATE TABLE "Comment" (
    "idComment" integer NOT NULL,
    date timestamp without time zone NOT NULL,
    message "char"[] NOT NULL,
    "idAuction" integer NOT NULL,
    username "char"[] NOT NULL
);

ALTER TABLE ONLY "Comment"
    ADD CONSTRAINT "Comment_pkey" PRIMARY KEY ("idComment");
	
ALTER TABLE ONLY "Comment"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idComment") REFERENCES "Auction"("idAuction");
	
ALTER TABLE ONLY "Comment"
    ADD CONSTRAINT "Username" FOREIGN KEY (username) REFERENCES "User"(username);

------------------------------------------ FILE TABLE ------------------------------------------
	
CREATE TABLE "File" (
    "idFile" integer NOT NULL,
    name "char"[] NOT NULL,
    path "char"[] NOT NULL
);

ALTER TABLE ONLY "File"
    ADD CONSTRAINT "File_pkey" PRIMARY KEY ("idFile");


------------------------------------------ NOTIFICATION TABLE ------------------------------------------
	
CREATE TABLE "Notification" (
    "idNotification" integer NOT NULL,
    "idAuction" integer
);

ALTER TABLE ONLY "Notification"
    ADD CONSTRAINT "Notification_pkey" PRIMARY KEY ("idNotification");
	
ALTER TABLE ONLY "Notification"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


------------------------------------------ TICKET TABLE ------------------------------------------
	
CREATE TABLE "Ticket" (
    "idTicket" integer NOT NULL,
    category "TicketCategory" NOT NULL,
    "resolvedDate" timestamp without time zone,
    solved boolean DEFAULT false,
    title "char"[] NOT NULL,
    date timestamp without time zone,
    message "char"[] NOT NULL,
    username "char"[] NOT NULL
);

ALTER TABLE ONLY "Ticket"
    ADD CONSTRAINT "Ticket_pkey" PRIMARY KEY ("idTicket");
	
ALTER TABLE ONLY "Ticket"
    ADD CONSTRAINT "Username" FOREIGN KEY (username) REFERENCES "User"(username);

	
------------------------------------------ TICKETCOMMENT TABLE ------------------------------------------

CREATE TABLE "TicketComment" (
    "idTicketComment" integer NOT NULL,
    username "char"[] NOT NULL,
    "idTicket" integer NOT NULL,
    date timestamp without time zone NOT NULL,
    message "char"[] NOT NULL
);

ALTER TABLE ONLY "TicketComment"
    ADD CONSTRAINT "TicketComment_pkey" PRIMARY KEY ("idTicketComment");

ALTER TABLE ONLY "TicketComment"
    ADD CONSTRAINT "Ticket" FOREIGN KEY ("idTicket") REFERENCES "Ticket"("idTicket");

ALTER TABLE ONLY "TicketComment"
    ADD CONSTRAINT "Username" FOREIGN KEY (username) REFERENCES "User"(username);	

	
------------------------------------------ USER TABLE ------------------------------------------

CREATE TABLE "User" (
    username "char"[] NOT NULL,
    password "char"[] NOT NULL,
    "birthDate" date NOT NULL,
    rating integer DEFAULT 0 NOT NULL,
    name "char"[] NOT NULL,
    address "char"[] NOT NULL,
    state "UserState" DEFAULT 'Registered'::"UserState" NOT NULL,
    CONSTRAINT "Over18" CHECK (((('now'::text)::date - "birthDate") >= 18))
);

ALTER TABLE ONLY "User"
    ADD CONSTRAINT user_pkey PRIMARY KEY (username);
	
	
--@@@@@@@@@@@@@@@@@@@ RELATIONSHIP TABLES @@@@@@@@@@@@@@@@@@@--


------------------------------------------ FILEAUCTION TABLE ------------------------------------------
	
CREATE TABLE "FileAuction" (
    "idAuction" integer NOT NULL,
    "idFile" integer NOT NULL
);

ALTER TABLE ONLY "FileAuction"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");
	
ALTER TABLE ONLY "FileAuction"
    ADD CONSTRAINT "File" FOREIGN KEY ("idFile") REFERENCES "File"("idFile");


------------------------------------------ FILEAUCTIONCOMMENT TABLE ------------------------------------------
	
CREATE TABLE "FileAuctionComment" (
    "idComment" integer NOT NULL,
    "idFile" integer NOT NULL
);

ALTER TABLE ONLY "FileAuctionComment"
    ADD CONSTRAINT "Comment" FOREIGN KEY ("idComment") REFERENCES "Comment"("idComment");


ALTER TABLE ONLY "FileAuctionComment"
    ADD CONSTRAINT "File" FOREIGN KEY ("idFile") REFERENCES "File"("idFile");


------------------------------------------ FILETICKETCOMMENT TABLE ------------------------------------------
	
CREATE TABLE "FileTicketComment" (
    "idTicketComment" integer NOT NULL,
    "idFile" integer NOT NULL
);

ALTER TABLE ONLY "FileTicketComment"
    ADD CONSTRAINT "File" FOREIGN KEY ("idFile") REFERENCES "File"("idFile");
	
ALTER TABLE ONLY "FileTicketComment"
    ADD CONSTRAINT "TicketComment" FOREIGN KEY ("idTicketComment") REFERENCES "TicketComment"("idTicketComment");


------------------------------------------ FOLLOW TABLE ------------------------------------------
	
CREATE TABLE "Follow" (
    username "char"[] NOT NULL,
    "idAuction" integer NOT NULL
);
	
ALTER TABLE ONLY "Follow"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");
	
ALTER TABLE ONLY "Follow"
    ADD CONSTRAINT "Username" FOREIGN KEY (username) REFERENCES "User"(username);


------------------------------------------ RATING TABLE ------------------------------------------
	
CREATE TABLE "Rating" (
    "winnerUser" "char"[] NOT NULL,
    "idAuction" integer NOT NULL,
    "sellerRating" double precision,
    "buyerRating" double precision,
    CONSTRAINT "buyingRatingPositive" CHECK ((("buyerRating" >= (0)::double precision) AND ("buyerRating" <= (5)::double precision))),
    CONSTRAINT "sellerRatingPositive" CHECK ((("sellerRating" >= (0)::double precision) AND ("sellerRating" <= (5)::double precision)))
);

ALTER TABLE ONLY "Rating"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");
	
ALTER TABLE ONLY "Rating"
    ADD CONSTRAINT "Winner" FOREIGN KEY ("winnerUser") REFERENCES "User"(username);

