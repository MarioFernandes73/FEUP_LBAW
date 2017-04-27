
SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET search_path = public, pg_catalog;


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


ALTER TYPE "AuctionCategory" OWNER TO postgres;


CREATE TYPE "AuctionState" AS ENUM (
    'Scheduled',
    'Opened',
    'Awaiting_payment',
    'Awaiting_delivery',
    'Closed',
    'Banned'
);


ALTER TYPE "AuctionState" OWNER TO postgres;


CREATE TYPE "AuctionType" AS ENUM (
    'Blind',
    'Dutch',
    'English'
);


ALTER TYPE "AuctionType" OWNER TO postgres;


CREATE TYPE "TicketCategory" AS ENUM (
    'Report',
    'Product',
    'Questions',
    'Others'
);


ALTER TYPE "TicketCategory" OWNER TO postgres;


CREATE TYPE "UserState" AS ENUM (
    'Administrator',
    'Inactive',
    'Banned',
    'Registered',
    'Validated'
);


ALTER TYPE "UserState" OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;


CREATE TABLE "Auction" (
    "basePrice" double precision NOT NULL,
    description "char"[],
    "durationHours" integer NOT NULL,
    name "char"[] NOT NULL,
    "startingDate" timestamp with time zone NOT NULL,
    category "AuctionCategory" NOT NULL,
    state "AuctionState" NOT NULL,
    type "AuctionType" NOT NULL,
    "currentPrice" double precision NOT NULL,
    "idAuction" integer NOT NULL,
    "idOwner" integer NOT NULL,
    CONSTRAINT "basePrice" CHECK (("basePrice" > (0)::double precision)),
    CONSTRAINT "positiveDuration" CHECK (("durationHours" > 0))
);


ALTER TABLE "Auction" OWNER TO "Mário";


CREATE SEQUENCE "Auction_idAuction_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Auction_idAuction_seq" OWNER TO "Mário";


ALTER SEQUENCE "Auction_idAuction_seq" OWNED BY "Auction"."idAuction";


CREATE SEQUENCE "Auction_idOwner_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Auction_idOwner_seq" OWNER TO "Mário";


ALTER SEQUENCE "Auction_idOwner_seq" OWNED BY "Auction"."idOwner";


CREATE TABLE "Bid" (
    ammount double precision NOT NULL,
    date timestamp without time zone NOT NULL,
    "idBid" integer NOT NULL,
    "idBidder" integer NOT NULL,
    "idAuction" integer NOT NULL,
    CONSTRAINT "positiveAmmount" CHECK ((ammount > (0)::double precision))
);


ALTER TABLE "Bid" OWNER TO "Mário";


CREATE SEQUENCE "Bid_idAuction_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Bid_idAuction_seq" OWNER TO "Mário";


ALTER SEQUENCE "Bid_idAuction_seq" OWNED BY "Bid"."idAuction";


CREATE SEQUENCE "Bid_idBid_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Bid_idBid_seq" OWNER TO "Mário";


ALTER SEQUENCE "Bid_idBid_seq" OWNED BY "Bid"."idBid";


CREATE SEQUENCE "Bid_idBidder_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Bid_idBidder_seq" OWNER TO "Mário";


ALTER SEQUENCE "Bid_idBidder_seq" OWNED BY "Bid"."idBidder";


CREATE TABLE "Comment" (
    date timestamp without time zone NOT NULL,
    message "char"[] NOT NULL,
    "idComment" integer NOT NULL,
    "idUser" integer NOT NULL,
    "idAuction" integer NOT NULL
);


ALTER TABLE "Comment" OWNER TO "Mário";


CREATE SEQUENCE "Comment_idAuction_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Comment_idAuction_seq" OWNER TO "Mário";


ALTER SEQUENCE "Comment_idAuction_seq" OWNED BY "Comment"."idAuction";


CREATE SEQUENCE "Comment_idComment_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Comment_idComment_seq" OWNER TO "Mário";


ALTER SEQUENCE "Comment_idComment_seq" OWNED BY "Comment"."idComment";


CREATE SEQUENCE "Comment_idUser_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Comment_idUser_seq" OWNER TO "Mário";


ALTER SEQUENCE "Comment_idUser_seq" OWNED BY "Comment"."idUser";


CREATE TABLE "File" (
    name "char"[] NOT NULL,
    path "char"[] NOT NULL,
    "idFile" integer NOT NULL
);


ALTER TABLE "File" OWNER TO "Mário";


CREATE TABLE "FileAuction" (
    "idAuction" integer NOT NULL,
    "idFile" integer NOT NULL
);


ALTER TABLE "FileAuction" OWNER TO "Mário";


CREATE TABLE "FileComment" (
    "idComment" integer NOT NULL,
    "idFile" integer NOT NULL
);


ALTER TABLE "FileComment" OWNER TO "Mário";


CREATE SEQUENCE "FileAuctionComment_idComment_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "FileAuctionComment_idComment_seq" OWNER TO "Mário";


ALTER SEQUENCE "FileAuctionComment_idComment_seq" OWNED BY "FileComment"."idComment";


CREATE SEQUENCE "FileAuctionComment_idFile_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "FileAuctionComment_idFile_seq" OWNER TO "Mário";


ALTER SEQUENCE "FileAuctionComment_idFile_seq" OWNED BY "FileComment"."idFile";


CREATE SEQUENCE "FileAuction_idAuction_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "FileAuction_idAuction_seq" OWNER TO "Mário";


ALTER SEQUENCE "FileAuction_idAuction_seq" OWNED BY "FileAuction"."idAuction";


CREATE SEQUENCE "FileAuction_idFile_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "FileAuction_idFile_seq" OWNER TO "Mário";


ALTER SEQUENCE "FileAuction_idFile_seq" OWNED BY "FileAuction"."idFile";


CREATE TABLE "FileTicketComment" (
    "idTicketComment" integer NOT NULL,
    "idFile" integer NOT NULL
);


ALTER TABLE "FileTicketComment" OWNER TO "Mário";


CREATE SEQUENCE "FileTicketComment_idFileComment_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "FileTicketComment_idFileComment_seq" OWNER TO "Mário";


ALTER SEQUENCE "FileTicketComment_idFileComment_seq" OWNED BY "FileTicketComment"."idTicketComment";


CREATE SEQUENCE "FileTicketComment_idFile_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "FileTicketComment_idFile_seq" OWNER TO "Mário";


ALTER SEQUENCE "FileTicketComment_idFile_seq" OWNED BY "FileTicketComment"."idFile";


CREATE SEQUENCE "File_idFile_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "File_idFile_seq" OWNER TO "Mário";


ALTER SEQUENCE "File_idFile_seq" OWNED BY "File"."idFile";


CREATE TABLE "Follow" (
    "idFollow" integer NOT NULL,
    "idUser" integer NOT NULL,
    "idAuction" integer NOT NULL
);


ALTER TABLE "Follow" OWNER TO "Mário";


CREATE SEQUENCE "Follow_idAuction_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Follow_idAuction_seq" OWNER TO "Mário";


ALTER SEQUENCE "Follow_idAuction_seq" OWNED BY "Follow"."idAuction";


CREATE SEQUENCE "Follow_idFollow_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Follow_idFollow_seq" OWNER TO "Mário";


ALTER SEQUENCE "Follow_idFollow_seq" OWNED BY "Follow"."idFollow";


CREATE SEQUENCE "Follow_idUser_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Follow_idUser_seq" OWNER TO "Mário";


ALTER SEQUENCE "Follow_idUser_seq" OWNED BY "Follow"."idUser";


CREATE TABLE "Notification" (
    "idComment" integer NOT NULL,
    "idAuction" integer NOT NULL,
    "idBid" integer NOT NULL,
    "idNotifcation" integer NOT NULL,
    CONSTRAINT "oneNull" CHECK (((("idAuction" IS NULL) AND ("idBid" IS NOT NULL)) OR (("idAuction" IS NOT NULL) AND ("idBid" IS NULL))))
);


ALTER TABLE "Notification" OWNER TO "Mário";


CREATE SEQUENCE "Notification_idAuction_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Notification_idAuction_seq" OWNER TO "Mário";


ALTER SEQUENCE "Notification_idAuction_seq" OWNED BY "Notification"."idAuction";


CREATE SEQUENCE "Notification_idBid_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Notification_idBid_seq" OWNER TO "Mário";


ALTER SEQUENCE "Notification_idBid_seq" OWNED BY "Notification"."idBid";


CREATE SEQUENCE "Notification_idComment_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Notification_idComment_seq" OWNER TO "Mário";


ALTER SEQUENCE "Notification_idComment_seq" OWNED BY "Notification"."idComment";


CREATE SEQUENCE "Notification_idNotifcation_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Notification_idNotifcation_seq" OWNER TO "Mário";


ALTER SEQUENCE "Notification_idNotifcation_seq" OWNED BY "Notification"."idNotifcation";


CREATE TABLE "Rating" (
    "sellerRating" double precision,
    "buyerRating" double precision,
    "idAuction" integer NOT NULL,
    "winnerUser" integer NOT NULL,
    CONSTRAINT "buyingRatingPositive" CHECK ((("buyerRating" >= (0)::double precision) AND ("buyerRating" <= (5)::double precision))),
    CONSTRAINT "sellerRatingPositive" CHECK ((("sellerRating" >= (0)::double precision) AND ("sellerRating" <= (5)::double precision)))
);


ALTER TABLE "Rating" OWNER TO "Mário";


CREATE SEQUENCE "Rating_idAuction_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Rating_idAuction_seq" OWNER TO "Mário";


ALTER SEQUENCE "Rating_idAuction_seq" OWNED BY "Rating"."idAuction";


CREATE SEQUENCE "Rating_winnerUser_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Rating_winnerUser_seq" OWNER TO "Mário";


ALTER SEQUENCE "Rating_winnerUser_seq" OWNED BY "Rating"."winnerUser";


CREATE TABLE "Ticket" (
    category "TicketCategory" NOT NULL,
    "resolvedDate" timestamp without time zone,
    solved boolean DEFAULT false,
    title "char"[] NOT NULL,
    date timestamp without time zone NOT NULL,
    message "char"[] NOT NULL,
    "idTicket" integer NOT NULL,
    "idUser" integer,
    "idCommentReported" integer,
    "idUserReported" integer,
    "idAuctionReported" integer,
    CONSTRAINT "onlyOneNotNull" CHECK (((("idCommentReported" IS NULL) AND ("idUserReported" IS NULL) AND ("idAuctionReported" IS NULL)) OR (("idCommentReported" IS NOT NULL) AND ("idUserReported" IS NULL) AND ("idAuctionReported" IS NULL)) OR (("idCommentReported" IS NULL) AND ("idUserReported" IS NOT NULL) AND ("idAuctionReported" IS NULL)) OR (("idCommentReported" IS NULL) AND ("idUserReported" IS NULL) AND ("idAuctionReported" IS NOT NULL))))
);


ALTER TABLE "Ticket" OWNER TO "Mário";


CREATE TABLE "TicketComment" (
    date timestamp without time zone NOT NULL,
    message "char"[] NOT NULL,
    "idTicketComment" integer NOT NULL,
    "idTicket" integer NOT NULL,
    "idUser" integer NOT NULL
);


ALTER TABLE "TicketComment" OWNER TO "Mário";


CREATE SEQUENCE "TicketComment_idTicketComment_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "TicketComment_idTicketComment_seq" OWNER TO "Mário";


ALTER SEQUENCE "TicketComment_idTicketComment_seq" OWNED BY "TicketComment"."idTicketComment";


CREATE SEQUENCE "TicketComment_idTicket_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "TicketComment_idTicket_seq" OWNER TO "Mário";


ALTER SEQUENCE "TicketComment_idTicket_seq" OWNED BY "TicketComment"."idTicket";


CREATE SEQUENCE "TicketComment_idUser_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "TicketComment_idUser_seq" OWNER TO "Mário";


ALTER SEQUENCE "TicketComment_idUser_seq" OWNED BY "TicketComment"."idUser";


CREATE SEQUENCE "Ticket_idAuctionReported_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Ticket_idAuctionReported_seq" OWNER TO "Mário";


ALTER SEQUENCE "Ticket_idAuctionReported_seq" OWNED BY "Ticket"."idAuctionReported";


CREATE SEQUENCE "Ticket_idCommentReported_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Ticket_idCommentReported_seq" OWNER TO "Mário";


ALTER SEQUENCE "Ticket_idCommentReported_seq" OWNED BY "Ticket"."idCommentReported";


CREATE SEQUENCE "Ticket_idTicket_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Ticket_idTicket_seq" OWNER TO "Mário";


ALTER SEQUENCE "Ticket_idTicket_seq" OWNED BY "Ticket"."idTicket";


CREATE SEQUENCE "Ticket_idUserReported_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Ticket_idUserReported_seq" OWNER TO "Mário";


ALTER SEQUENCE "Ticket_idUserReported_seq" OWNED BY "Ticket"."idUserReported";


CREATE SEQUENCE "Ticket_idUser_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Ticket_idUser_seq" OWNER TO "Mário";


ALTER SEQUENCE "Ticket_idUser_seq" OWNED BY "Ticket"."idUser";


CREATE TABLE "User" (
    password "char"[] NOT NULL,
    "birthDate" date NOT NULL,
    rating integer DEFAULT 0 NOT NULL,
    name "char"[] NOT NULL,
    address "char"[],
    state "UserState" DEFAULT 'Registered'::"UserState" NOT NULL,
    "idUser" integer NOT NULL,
    username "char"[] NOT NULL,
    CONSTRAINT over18 CHECK (((('now'::text)::date - "birthDate") >= 18)),
    CONSTRAINT "ratingBounds" CHECK (((rating >= 0) AND (rating <= 5)))
);


ALTER TABLE "User" OWNER TO "Mário";


CREATE SEQUENCE "User_idUser_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "User_idUser_seq" OWNER TO "Mário";


ALTER SEQUENCE "User_idUser_seq" OWNED BY "User"."idUser";


ALTER TABLE ONLY "Auction" ALTER COLUMN "idAuction" SET DEFAULT nextval('"Auction_idAuction_seq"'::regclass);

ALTER TABLE ONLY "Auction" ALTER COLUMN "idOwner" SET DEFAULT nextval('"Auction_idOwner_seq"'::regclass);


ALTER TABLE ONLY "Bid" ALTER COLUMN "idBid" SET DEFAULT nextval('"Bid_idBid_seq"'::regclass);


ALTER TABLE ONLY "Bid" ALTER COLUMN "idBidder" SET DEFAULT nextval('"Bid_idBidder_seq"'::regclass);


ALTER TABLE ONLY "Bid" ALTER COLUMN "idAuction" SET DEFAULT nextval('"Bid_idAuction_seq"'::regclass);


ALTER TABLE ONLY "Comment" ALTER COLUMN "idComment" SET DEFAULT nextval('"Comment_idComment_seq"'::regclass);


ALTER TABLE ONLY "Comment" ALTER COLUMN "idUser" SET DEFAULT nextval('"Comment_idUser_seq"'::regclass);


ALTER TABLE ONLY "Comment" ALTER COLUMN "idAuction" SET DEFAULT nextval('"Comment_idAuction_seq"'::regclass);


ALTER TABLE ONLY "File" ALTER COLUMN "idFile" SET DEFAULT nextval('"File_idFile_seq"'::regclass);


ALTER TABLE ONLY "FileAuction" ALTER COLUMN "idAuction" SET DEFAULT nextval('"FileAuction_idAuction_seq"'::regclass);


ALTER TABLE ONLY "FileAuction" ALTER COLUMN "idFile" SET DEFAULT nextval('"FileAuction_idFile_seq"'::regclass);


ALTER TABLE ONLY "FileComment" ALTER COLUMN "idComment" SET DEFAULT nextval('"FileAuctionComment_idComment_seq"'::regclass);


ALTER TABLE ONLY "FileComment" ALTER COLUMN "idFile" SET DEFAULT nextval('"FileAuctionComment_idFile_seq"'::regclass);

ALTER TABLE ONLY "FileTicketComment" ALTER COLUMN "idTicketComment" SET DEFAULT nextval('"FileTicketComment_idFileComment_seq"'::regclass);


ALTER TABLE ONLY "FileTicketComment" ALTER COLUMN "idFile" SET DEFAULT nextval('"FileTicketComment_idFile_seq"'::regclass);


ALTER TABLE ONLY "Follow" ALTER COLUMN "idFollow" SET DEFAULT nextval('"Follow_idFollow_seq"'::regclass);


ALTER TABLE ONLY "Follow" ALTER COLUMN "idUser" SET DEFAULT nextval('"Follow_idUser_seq"'::regclass);


ALTER TABLE ONLY "Follow" ALTER COLUMN "idAuction" SET DEFAULT nextval('"Follow_idAuction_seq"'::regclass);


ALTER TABLE ONLY "Notification" ALTER COLUMN "idComment" SET DEFAULT nextval('"Notification_idComment_seq"'::regclass);


ALTER TABLE ONLY "Notification" ALTER COLUMN "idAuction" SET DEFAULT nextval('"Notification_idAuction_seq"'::regclass);


ALTER TABLE ONLY "Notification" ALTER COLUMN "idBid" SET DEFAULT nextval('"Notification_idBid_seq"'::regclass);


ALTER TABLE ONLY "Notification" ALTER COLUMN "idNotifcation" SET DEFAULT nextval('"Notification_idNotifcation_seq"'::regclass);


ALTER TABLE ONLY "Rating" ALTER COLUMN "idAuction" SET DEFAULT nextval('"Rating_idAuction_seq"'::regclass);


ALTER TABLE ONLY "Rating" ALTER COLUMN "winnerUser" SET DEFAULT nextval('"Rating_winnerUser_seq"'::regclass);


ALTER TABLE ONLY "Ticket" ALTER COLUMN "idTicket" SET DEFAULT nextval('"Ticket_idTicket_seq"'::regclass);


ALTER TABLE ONLY "Ticket" ALTER COLUMN "idUser" SET DEFAULT nextval('"Ticket_idUser_seq"'::regclass);


ALTER TABLE ONLY "Ticket" ALTER COLUMN "idCommentReported" SET DEFAULT nextval('"Ticket_idCommentReported_seq"'::regclass);


ALTER TABLE ONLY "Ticket" ALTER COLUMN "idUserReported" SET DEFAULT nextval('"Ticket_idUserReported_seq"'::regclass);


ALTER TABLE ONLY "Ticket" ALTER COLUMN "idAuctionReported" SET DEFAULT nextval('"Ticket_idAuctionReported_seq"'::regclass);


ALTER TABLE ONLY "TicketComment" ALTER COLUMN "idTicketComment" SET DEFAULT nextval('"TicketComment_idTicketComment_seq"'::regclass);


ALTER TABLE ONLY "TicketComment" ALTER COLUMN "idTicket" SET DEFAULT nextval('"TicketComment_idTicket_seq"'::regclass);


ALTER TABLE ONLY "TicketComment" ALTER COLUMN "idUser" SET DEFAULT nextval('"TicketComment_idUser_seq"'::regclass);


ALTER TABLE ONLY "User" ALTER COLUMN "idUser" SET DEFAULT nextval('"User_idUser_seq"'::regclass);


COPY "Auction" ("basePrice", description, "durationHours", name, "startingDate", category, state, type, "currentPrice", "idAuction", "idOwner") FROM stdin;
\.


SELECT pg_catalog.setval('"Auction_idAuction_seq"', 1, false);


SELECT pg_catalog.setval('"Auction_idOwner_seq"', 1, false);


COPY "Bid" (ammount, date, "idBid", "idBidder", "idAuction") FROM stdin;
\.


SELECT pg_catalog.setval('"Bid_idAuction_seq"', 1, false);


SELECT pg_catalog.setval('"Bid_idBid_seq"', 1, false);


SELECT pg_catalog.setval('"Bid_idBidder_seq"', 1, false);


COPY "Comment" (date, message, "idComment", "idUser", "idAuction") FROM stdin;
\.


SELECT pg_catalog.setval('"Comment_idAuction_seq"', 1, false);


SELECT pg_catalog.setval('"Comment_idComment_seq"', 1, false);


SELECT pg_catalog.setval('"Comment_idUser_seq"', 1, false);


COPY "File" (name, path, "idFile") FROM stdin;
\.


COPY "FileAuction" ("idAuction", "idFile") FROM stdin;
\.


SELECT pg_catalog.setval('"FileAuctionComment_idComment_seq"', 1, false);


SELECT pg_catalog.setval('"FileAuctionComment_idFile_seq"', 1, false);


SELECT pg_catalog.setval('"FileAuction_idAuction_seq"', 1, false);


SELECT pg_catalog.setval('"FileAuction_idFile_seq"', 1, false);


COPY "FileComment" ("idComment", "idFile") FROM stdin;
\.


COPY "FileTicketComment" ("idTicketComment", "idFile") FROM stdin;
\.


SELECT pg_catalog.setval('"FileTicketComment_idFileComment_seq"', 1, false);


SELECT pg_catalog.setval('"FileTicketComment_idFile_seq"', 1, false);


SELECT pg_catalog.setval('"File_idFile_seq"', 1, false);


COPY "Follow" ("idFollow", "idUser", "idAuction") FROM stdin;
\.


SELECT pg_catalog.setval('"Follow_idAuction_seq"', 1, false);


SELECT pg_catalog.setval('"Follow_idFollow_seq"', 1, false);


SELECT pg_catalog.setval('"Follow_idUser_seq"', 1, false);


COPY "Notification" ("idComment", "idAuction", "idBid", "idNotifcation") FROM stdin;
\.


SELECT pg_catalog.setval('"Notification_idAuction_seq"', 1, false);


SELECT pg_catalog.setval('"Notification_idBid_seq"', 1, false);


SELECT pg_catalog.setval('"Notification_idComment_seq"', 1, false);


SELECT pg_catalog.setval('"Notification_idNotifcation_seq"', 1, false);


COPY "Rating" ("sellerRating", "buyerRating", "idAuction", "winnerUser") FROM stdin;
\.


SELECT pg_catalog.setval('"Rating_idAuction_seq"', 1, false);


SELECT pg_catalog.setval('"Rating_winnerUser_seq"', 1, false);


COPY "Ticket" (category, "resolvedDate", solved, title, date, message, "idTicket", "idUser", "idCommentReported", "idUserReported", "idAuctionReported") FROM stdin;
\.


COPY "TicketComment" (date, message, "idTicketComment", "idTicket", "idUser") FROM stdin;
\.


SELECT pg_catalog.setval('"TicketComment_idTicketComment_seq"', 1, false);


SELECT pg_catalog.setval('"TicketComment_idTicket_seq"', 1, false);


SELECT pg_catalog.setval('"TicketComment_idUser_seq"', 1, false);


SELECT pg_catalog.setval('"Ticket_idAuctionReported_seq"', 1, false);


SELECT pg_catalog.setval('"Ticket_idCommentReported_seq"', 1, false);


SELECT pg_catalog.setval('"Ticket_idTicket_seq"', 1, false);


SELECT pg_catalog.setval('"Ticket_idUserReported_seq"', 1, false);


SELECT pg_catalog.setval('"Ticket_idUser_seq"', 1, false);


COPY "User" (password, "birthDate", rating, name, address, state, "idUser", username) FROM stdin;
\.


SELECT pg_catalog.setval('"User_idUser_seq"', 1, false);


ALTER TABLE ONLY "Auction"
    ADD CONSTRAINT "Auction_pkey" PRIMARY KEY ("idAuction");


ALTER TABLE ONLY "Bid"
    ADD CONSTRAINT "Bid_pkey" PRIMARY KEY ("idBid");


ALTER TABLE ONLY "Comment"
    ADD CONSTRAINT "Comment_pkey" PRIMARY KEY ("idComment");


ALTER TABLE ONLY "File"
    ADD CONSTRAINT "File_pkey" PRIMARY KEY ("idFile");


ALTER TABLE ONLY "Follow"
    ADD CONSTRAINT "Follow_pkey" PRIMARY KEY ("idFollow");


ALTER TABLE ONLY "Notification"
    ADD CONSTRAINT "Notification_pkey" PRIMARY KEY ("idNotifcation");


ALTER TABLE ONLY "TicketComment"
    ADD CONSTRAINT "TicketComment_pkey" PRIMARY KEY ("idTicketComment");


ALTER TABLE ONLY "Ticket"
    ADD CONSTRAINT "Ticket_pkey" PRIMARY KEY ("idTicket");


ALTER TABLE ONLY "User"
    ADD CONSTRAINT "User_pkey" PRIMARY KEY ("idUser");


ALTER TABLE ONLY "User"
    ADD CONSTRAINT "usernameUnique" UNIQUE (username);


ALTER TABLE ONLY "Bid"
    ADD CONSTRAINT auction FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


ALTER TABLE ONLY "Comment"
    ADD CONSTRAINT auction FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


ALTER TABLE ONLY "Notification"
    ADD CONSTRAINT auction FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


ALTER TABLE ONLY "Follow"
    ADD CONSTRAINT auction FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


ALTER TABLE ONLY "FileAuction"
    ADD CONSTRAINT auction FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


ALTER TABLE ONLY "Rating"
    ADD CONSTRAINT auction FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


ALTER TABLE ONLY "Ticket"
    ADD CONSTRAINT "auctionReported" FOREIGN KEY ("idAuctionReported") REFERENCES "Auction"("idAuction");


ALTER TABLE ONLY "Notification"
    ADD CONSTRAINT bid FOREIGN KEY ("idBid") REFERENCES "Bid"("idBid");


ALTER TABLE ONLY "Bid"
    ADD CONSTRAINT bidder FOREIGN KEY ("idBidder") REFERENCES "User"("idUser");


ALTER TABLE ONLY "Notification"
    ADD CONSTRAINT comment FOREIGN KEY ("idComment") REFERENCES "Comment"("idComment");


ALTER TABLE ONLY "FileComment"
    ADD CONSTRAINT comment FOREIGN KEY ("idComment") REFERENCES "Comment"("idComment");


ALTER TABLE ONLY "Ticket"
    ADD CONSTRAINT "commentReported" FOREIGN KEY ("idCommentReported") REFERENCES "Comment"("idComment");

	
ALTER TABLE ONLY "FileComment"
    ADD CONSTRAINT file FOREIGN KEY ("idFile") REFERENCES "File"("idFile");


ALTER TABLE ONLY "FileTicketComment"
    ADD CONSTRAINT file FOREIGN KEY ("idFile") REFERENCES "File"("idFile");


ALTER TABLE ONLY "FileAuction"
    ADD CONSTRAINT file FOREIGN KEY ("idFile") REFERENCES "File"("idFile");


ALTER TABLE ONLY "Auction"
    ADD CONSTRAINT owner FOREIGN KEY ("idOwner") REFERENCES "User"("idUser");


ALTER TABLE ONLY "TicketComment"
    ADD CONSTRAINT ticket FOREIGN KEY ("idTicket") REFERENCES "Ticket"("idTicket");


ALTER TABLE ONLY "FileTicketComment"
    ADD CONSTRAINT "ticketComment" FOREIGN KEY ("idTicketComment") REFERENCES "Ticket"("idTicket");


ALTER TABLE ONLY "Ticket"
    ADD CONSTRAINT "user" FOREIGN KEY ("idUser") REFERENCES "User"("idUser");


ALTER TABLE ONLY "TicketComment"
    ADD CONSTRAINT "user" FOREIGN KEY ("idUser") REFERENCES "User"("idUser");


ALTER TABLE ONLY "Comment"
    ADD CONSTRAINT "user" FOREIGN KEY ("idUser") REFERENCES "User"("idUser");


ALTER TABLE ONLY "Follow"
    ADD CONSTRAINT "user" FOREIGN KEY ("idUser") REFERENCES "User"("idUser");


ALTER TABLE ONLY "Ticket"
    ADD CONSTRAINT "userReported" FOREIGN KEY ("idUserReported") REFERENCES "User"("idUser");


ALTER TABLE ONLY "Rating"
    ADD CONSTRAINT winner FOREIGN KEY ("winnerUser") REFERENCES "User"("idUser");