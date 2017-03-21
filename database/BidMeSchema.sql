--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.2
-- Dumped by pg_dump version 9.6.2

-- Started on 2017-03-21 12:35:03

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET search_path = public, pg_catalog;

--
-- TOC entry 583 (class 1247 OID 24668)
-- Name: AuctionCategory; Type: TYPE; Schema: public; Owner: postgres
--

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

--
-- TOC entry 586 (class 1247 OID 24686)
-- Name: AuctionState; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE "AuctionState" AS ENUM (
    'Scheduled',
    'Opened',
    'Awaiting_payment',
    'Awaiting_delivery',
    'Closed',
    'Banned'
);


ALTER TYPE "AuctionState" OWNER TO postgres;

--
-- TOC entry 589 (class 1247 OID 24700)
-- Name: AuctionType; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE "AuctionType" AS ENUM (
    'Blind',
    'Dutch',
    'English'
);


ALTER TYPE "AuctionType" OWNER TO postgres;

--
-- TOC entry 600 (class 1247 OID 24724)
-- Name: TicketCategory; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE "TicketCategory" AS ENUM (
    'Report',
    'Product',
    'Questions',
    'Others'
);


ALTER TYPE "TicketCategory" OWNER TO postgres;

--
-- TOC entry 580 (class 1247 OID 24656)
-- Name: UserState; Type: TYPE; Schema: public; Owner: postgres
--

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

--
-- TOC entry 186 (class 1259 OID 24604)
-- Name: Auction; Type: TABLE; Schema: public; Owner: Mário
--

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
    "currentPrice" double precision,
    CONSTRAINT "basePrice" CHECK (("basePrice" > (0)::double precision))
);


ALTER TABLE "Auction" OWNER TO "Mário";

--
-- TOC entry 187 (class 1259 OID 24615)
-- Name: Bid; Type: TABLE; Schema: public; Owner: Mário
--

CREATE TABLE "Bid" (
    "idBid" integer NOT NULL,
    ammount double precision NOT NULL,
    bidder "char"[] NOT NULL,
    "idAuction" integer NOT NULL,
    date timestamp without time zone NOT NULL
);


ALTER TABLE "Bid" OWNER TO "Mário";

--
-- TOC entry 189 (class 1259 OID 24715)
-- Name: Comment; Type: TABLE; Schema: public; Owner: Mário
--

CREATE TABLE "Comment" (
    "idComment" integer NOT NULL,
    date timestamp without time zone NOT NULL,
    message "char"[] NOT NULL,
    "idAuction" integer NOT NULL,
    username "char"[] NOT NULL
);


ALTER TABLE "Comment" OWNER TO "Mário";

--
-- TOC entry 188 (class 1259 OID 24707)
-- Name: File; Type: TABLE; Schema: public; Owner: Mário
--

CREATE TABLE "File" (
    "idFile" integer NOT NULL,
    name "char"[] NOT NULL,
    path "char"[] NOT NULL
);


ALTER TABLE "File" OWNER TO "Mário";

--
-- TOC entry 198 (class 1259 OID 24816)
-- Name: FileAuction; Type: TABLE; Schema: public; Owner: Mário
--

CREATE TABLE "FileAuction" (
    "idAuction" integer NOT NULL,
    "idFile" integer NOT NULL
);


ALTER TABLE "FileAuction" OWNER TO "Mário";

--
-- TOC entry 196 (class 1259 OID 24809)
-- Name: FileAuctionComment; Type: TABLE; Schema: public; Owner: Mário
--

CREATE TABLE "FileAuctionComment" (
    "idComment" integer NOT NULL,
    "idFile" integer NOT NULL
);


ALTER TABLE "FileAuctionComment" OWNER TO "Mário";

--
-- TOC entry 197 (class 1259 OID 24813)
-- Name: FileTicketComment; Type: TABLE; Schema: public; Owner: Mário
--

CREATE TABLE "FileTicketComment" (
    "idTicketComment" integer NOT NULL,
    "idFile" integer NOT NULL
);


ALTER TABLE "FileTicketComment" OWNER TO "Mário";

--
-- TOC entry 193 (class 1259 OID 24786)
-- Name: Follow; Type: TABLE; Schema: public; Owner: Mário
--

CREATE TABLE "Follow" (
    "idFollow" integer NOT NULL,
    username "char"[] NOT NULL,
    "idAuction" integer NOT NULL
);


ALTER TABLE "Follow" OWNER TO "Mário";

--
-- TOC entry 192 (class 1259 OID 24781)
-- Name: Notification; Type: TABLE; Schema: public; Owner: Mário
--

CREATE TABLE "Notification" (
    "idNotification" integer NOT NULL,
    "idAuction" integer
);


ALTER TABLE "Notification" OWNER TO "Mário";

--
-- TOC entry 195 (class 1259 OID 24802)
-- Name: Rating; Type: TABLE; Schema: public; Owner: Mário
--

CREATE TABLE "Rating" (
    "winnerUser" "char"[] NOT NULL,
    "idAuction" integer NOT NULL,
    "sellerRating" double precision,
    "buyerRating" double precision,
    CONSTRAINT "sellerRatingPositive" CHECK ((("sellerRating" >= (0)::double precision) AND ("sellerRating" <= (5)::double precision)))
);


ALTER TABLE "Rating" OWNER TO "Mário";

--
-- TOC entry 190 (class 1259 OID 24733)
-- Name: Ticket; Type: TABLE; Schema: public; Owner: Mário
--

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


ALTER TABLE "Ticket" OWNER TO "Mário";

--
-- TOC entry 191 (class 1259 OID 24773)
-- Name: TicketComment; Type: TABLE; Schema: public; Owner: Mário
--

CREATE TABLE "TicketComment" (
    "idTicketComment" integer NOT NULL,
    username "char"[] NOT NULL,
    "idTicket" integer NOT NULL,
    date timestamp without time zone NOT NULL,
    message "char"[] NOT NULL
);


ALTER TABLE "TicketComment" OWNER TO "Mário";

--
-- TOC entry 185 (class 1259 OID 24587)
-- Name: User; Type: TABLE; Schema: public; Owner: Mário
--

CREATE TABLE "User" (
    username "char"[] NOT NULL,
    password "char"[] NOT NULL,
    "birthDate" date NOT NULL,
    rating integer DEFAULT 0 NOT NULL,
    name "char"[] NOT NULL,
    address "char"[] NOT NULL,
    state "UserState" DEFAULT 'Registered'::"UserState" NOT NULL
);


ALTER TABLE "User" OWNER TO "Mário";

--
-- TOC entry 194 (class 1259 OID 24794)
-- Name: Winner; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "Winner" (
    "idWinner" integer NOT NULL,
    username "char"[] NOT NULL,
    "idAuction" integer NOT NULL
);


ALTER TABLE "Winner" OWNER TO postgres;

--
-- TOC entry 2238 (class 0 OID 24604)
-- Dependencies: 186
-- Data for Name: Auction; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "Auction" ("basePrice", description, "durationHours", name, "startingDate", "idAuction", category, state, type, owner, "currentPrice") FROM stdin;
\.


--
-- TOC entry 2239 (class 0 OID 24615)
-- Dependencies: 187
-- Data for Name: Bid; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "Bid" ("idBid", ammount, bidder, "idAuction", date) FROM stdin;
\.


--
-- TOC entry 2241 (class 0 OID 24715)
-- Dependencies: 189
-- Data for Name: Comment; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "Comment" ("idComment", date, message, "idAuction", username) FROM stdin;
\.


--
-- TOC entry 2240 (class 0 OID 24707)
-- Dependencies: 188
-- Data for Name: File; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "File" ("idFile", name, path) FROM stdin;
\.


--
-- TOC entry 2250 (class 0 OID 24816)
-- Dependencies: 198
-- Data for Name: FileAuction; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "FileAuction" ("idAuction", "idFile") FROM stdin;
\.


--
-- TOC entry 2248 (class 0 OID 24809)
-- Dependencies: 196
-- Data for Name: FileAuctionComment; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "FileAuctionComment" ("idComment", "idFile") FROM stdin;
\.


--
-- TOC entry 2249 (class 0 OID 24813)
-- Dependencies: 197
-- Data for Name: FileTicketComment; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "FileTicketComment" ("idTicketComment", "idFile") FROM stdin;
\.


--
-- TOC entry 2245 (class 0 OID 24786)
-- Dependencies: 193
-- Data for Name: Follow; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "Follow" ("idFollow", username, "idAuction") FROM stdin;
\.


--
-- TOC entry 2244 (class 0 OID 24781)
-- Dependencies: 192
-- Data for Name: Notification; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "Notification" ("idNotification", "idAuction") FROM stdin;
\.


--
-- TOC entry 2247 (class 0 OID 24802)
-- Dependencies: 195
-- Data for Name: Rating; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "Rating" ("winnerUser", "idAuction", "sellerRating", "buyerRating") FROM stdin;
\.


--
-- TOC entry 2242 (class 0 OID 24733)
-- Dependencies: 190
-- Data for Name: Ticket; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "Ticket" ("idTicket", category, "resolvedDate", solved, title, date, message, username) FROM stdin;
\.


--
-- TOC entry 2243 (class 0 OID 24773)
-- Dependencies: 191
-- Data for Name: TicketComment; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "TicketComment" ("idTicketComment", username, "idTicket", date, message) FROM stdin;
\.


--
-- TOC entry 2237 (class 0 OID 24587)
-- Dependencies: 185
-- Data for Name: User; Type: TABLE DATA; Schema: public; Owner: Mário
--

COPY "User" (username, password, "birthDate", rating, name, address, state) FROM stdin;
\.


--
-- TOC entry 2246 (class 0 OID 24794)
-- Dependencies: 194
-- Data for Name: Winner; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "Winner" ("idWinner", username, "idAuction") FROM stdin;
\.


--
-- TOC entry 2084 (class 2606 OID 24611)
-- Name: Auction Auction_pkey; Type: CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Auction"
    ADD CONSTRAINT "Auction_pkey" PRIMARY KEY ("idAuction");


--
-- TOC entry 2086 (class 2606 OID 24619)
-- Name: Bid Bid_pkey; Type: CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Bid"
    ADD CONSTRAINT "Bid_pkey" PRIMARY KEY ("idBid");


--
-- TOC entry 2090 (class 2606 OID 24722)
-- Name: Comment Comment_pkey; Type: CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Comment"
    ADD CONSTRAINT "Comment_pkey" PRIMARY KEY ("idComment");


--
-- TOC entry 2088 (class 2606 OID 24714)
-- Name: File File_pkey; Type: CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "File"
    ADD CONSTRAINT "File_pkey" PRIMARY KEY ("idFile");


--
-- TOC entry 2098 (class 2606 OID 24793)
-- Name: Follow Follow_pkey; Type: CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Follow"
    ADD CONSTRAINT "Follow_pkey" PRIMARY KEY ("idFollow");


--
-- TOC entry 2096 (class 2606 OID 24785)
-- Name: Notification Notification_pkey; Type: CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Notification"
    ADD CONSTRAINT "Notification_pkey" PRIMARY KEY ("idNotification");


--
-- TOC entry 2094 (class 2606 OID 24780)
-- Name: TicketComment TicketComment_pkey; Type: CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "TicketComment"
    ADD CONSTRAINT "TicketComment_pkey" PRIMARY KEY ("idTicketComment");


--
-- TOC entry 2092 (class 2606 OID 24740)
-- Name: Ticket Ticket_pkey; Type: CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Ticket"
    ADD CONSTRAINT "Ticket_pkey" PRIMARY KEY ("idTicket");


--
-- TOC entry 2100 (class 2606 OID 24801)
-- Name: Winner Winner_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "Winner"
    ADD CONSTRAINT "Winner_pkey" PRIMARY KEY ("idWinner");


--
-- TOC entry 2082 (class 2606 OID 24594)
-- Name: User user_pkey; Type: CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "User"
    ADD CONSTRAINT user_pkey PRIMARY KEY (username);


--
-- TOC entry 2103 (class 2606 OID 24829)
-- Name: Bid Auction; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Bid"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


--
-- TOC entry 2104 (class 2606 OID 24849)
-- Name: Comment Auction; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Comment"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idComment") REFERENCES "Auction"("idAuction");


--
-- TOC entry 2109 (class 2606 OID 24859)
-- Name: Notification Auction; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Notification"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


--
-- TOC entry 2111 (class 2606 OID 24869)
-- Name: Follow Auction; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Follow"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


--
-- TOC entry 2118 (class 2606 OID 24894)
-- Name: FileAuction Auction; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "FileAuction"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


--
-- TOC entry 2113 (class 2606 OID 24909)
-- Name: Rating Auction; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Rating"
    ADD CONSTRAINT "Auction" FOREIGN KEY ("idAuction") REFERENCES "Auction"("idAuction");


--
-- TOC entry 2102 (class 2606 OID 24824)
-- Name: Bid Bidder; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Bid"
    ADD CONSTRAINT "Bidder" FOREIGN KEY (bidder) REFERENCES "User"(username);


--
-- TOC entry 2114 (class 2606 OID 24874)
-- Name: FileAuctionComment Comment; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "FileAuctionComment"
    ADD CONSTRAINT "Comment" FOREIGN KEY ("idComment") REFERENCES "Comment"("idComment");


--
-- TOC entry 2115 (class 2606 OID 24879)
-- Name: FileAuctionComment File; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "FileAuctionComment"
    ADD CONSTRAINT "File" FOREIGN KEY ("idFile") REFERENCES "File"("idFile");


--
-- TOC entry 2117 (class 2606 OID 24889)
-- Name: FileTicketComment File; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "FileTicketComment"
    ADD CONSTRAINT "File" FOREIGN KEY ("idFile") REFERENCES "File"("idFile");


--
-- TOC entry 2119 (class 2606 OID 24899)
-- Name: FileAuction File; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "FileAuction"
    ADD CONSTRAINT "File" FOREIGN KEY ("idFile") REFERENCES "File"("idFile");


--
-- TOC entry 2101 (class 2606 OID 24819)
-- Name: Auction Owner; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Auction"
    ADD CONSTRAINT "Owner" FOREIGN KEY (owner) REFERENCES "User"(username);


--
-- TOC entry 2108 (class 2606 OID 24844)
-- Name: TicketComment Ticket; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "TicketComment"
    ADD CONSTRAINT "Ticket" FOREIGN KEY ("idTicket") REFERENCES "Ticket"("idTicket");


--
-- TOC entry 2116 (class 2606 OID 24884)
-- Name: FileTicketComment TicketComment; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "FileTicketComment"
    ADD CONSTRAINT "TicketComment" FOREIGN KEY ("idTicketComment") REFERENCES "TicketComment"("idTicketComment");


--
-- TOC entry 2106 (class 2606 OID 24834)
-- Name: Ticket Username; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Ticket"
    ADD CONSTRAINT "Username" FOREIGN KEY (username) REFERENCES "User"(username);


--
-- TOC entry 2107 (class 2606 OID 24839)
-- Name: TicketComment Username; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "TicketComment"
    ADD CONSTRAINT "Username" FOREIGN KEY (username) REFERENCES "User"(username);


--
-- TOC entry 2105 (class 2606 OID 24854)
-- Name: Comment Username; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Comment"
    ADD CONSTRAINT "Username" FOREIGN KEY (username) REFERENCES "User"(username);


--
-- TOC entry 2110 (class 2606 OID 24864)
-- Name: Follow Username; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Follow"
    ADD CONSTRAINT "Username" FOREIGN KEY (username) REFERENCES "User"(username);


--
-- TOC entry 2112 (class 2606 OID 24904)
-- Name: Rating Winner; Type: FK CONSTRAINT; Schema: public; Owner: Mário
--

ALTER TABLE ONLY "Rating"
    ADD CONSTRAINT "Winner" FOREIGN KEY ("winnerUser") REFERENCES "User"(username);


-- Completed on 2017-03-21 12:35:04

--
-- PostgreSQL database dump complete
--

